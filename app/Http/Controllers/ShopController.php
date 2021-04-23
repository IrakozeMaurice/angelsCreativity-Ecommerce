<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        if (request()->category) {
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
        } else {
            $products = Product::where('featured', true)->get();
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        } elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        }

        return view('shop', compact('products', 'categoryName'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::whereHas('categories', function ($query) use ($product) {
            $query->whereIn('name', $product->categories->pluck('name'));
        })->where('slug', '!=', $slug)->inRandomOrder()->take(8)->get();

        return view('product', compact('product', 'mightAlsoLike'));
    }

    public function search(Request $request)
    {

        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('details', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(10);

        return view('search-results', compact('products'));
    }
}
