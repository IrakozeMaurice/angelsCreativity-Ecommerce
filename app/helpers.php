<?php

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

function getAllCategories()
{
    $categories = DB::table('category')->get();
    return $categories;
}

function setActiveCategory($category, $output = 'active_link')
{
    if (!request()->category && request()->is(strtolower($category))) {
        return $output;
    } else if (request()->category == $category) {
        return $output;
    } else {
        return '';
    }
}

function getSpecialProducts()
{
    $specialProducts = Product::where('special', true)->take(8)->get();
    return $specialProducts;
}

function formatPrice($price)
{
    return number_format($price);
}

function getCartTotal()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $newSubtotal = Cart::subtotal() - $discount;
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTotal = $newSubtotal * (1 + $tax);

    return $newTotal;
}
