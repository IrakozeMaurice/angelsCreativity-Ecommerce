<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        // $orders = auth()->user()->orders;

        $orders = auth()->user()->orders()->with('products')->get();

        return view('my-orders', compact('orders'));
    }

    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            return back();
        }
        $products = $order->products;

        return view('my-order', compact('products', 'order'));
    }
}
