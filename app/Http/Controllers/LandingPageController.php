<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slide;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Product::where('featured', true)->inRandomOrder()->get();

        $newProducts = Product::orderBy('created_at', 'DESC')->take(9)->get();

        $posts = DB::table('posts')->orderBy('updated_at', 'desc')->take(4)->get();

        $slides = Slide::all();

        return view('landing-page', compact('products', 'newProducts', 'posts', 'slides'));
    }

    public function showBlog($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        return view('blog-details', compact('post'));
    }
}
