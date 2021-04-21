<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist');
    }

    public function switchToCart($id)
    {
        $item = Cart::instance('wishlist')->get($id);
        Cart::instance('wishlist')->remove($id);  //remove item from wishlist

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('success-message', 'Item is already in your cart!');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return back()->with('success-message', 'item has been moved to cart!');
    }

    public function destroy($id)
    {
        Cart::instance('wishlist')->remove($id);

        return back()->with('success-message', 'Item has been removed from wishlist!');
    }
}
