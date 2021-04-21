<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function index()
    {
        $mightAlsoLike = Product::select("*")
            ->whereNotIn('id', Cart::instance('default')->content())
            ->get();

        return view('cart')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'tax' => $this->getNumbers()->get('tax'),
            'discount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTax' => $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal'),
        ]);
    }

    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('success-message', 'Item is already in your cart!');
        }

        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Product');

        return back()->with('success-message', 'item was added to your cart!');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5']));
            return response()->json(['success' => false], 500);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success-message', 'Quantity was updated successfully');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('success-message', 'Item has been removed!');
    }

    //add item to wishlist

    public function switchToWishlist($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);  //remove item from list of products in cart

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('success-message', 'item is already in your wishlist! <a href="/wishlist"> Go to wishlist</a>');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return back()->with('success-message', 'item has been added to your wishlist! <a href="/wishlist"> Go to wishlist</a>');
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['code'] ?? null;
        $newSubtotal = Cart::subtotal() - $discount;
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'code' => $code,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }
}
