<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderPlaced;
use App\Order;
use App\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            session()->flash('errors', collect(['cart is empty']));
            return back();
        }
        return view('checkout');
    }

    public function store(CheckoutRequest $request)
    {
        //1. add to orders table and pivot table
        $order = $this->addToOrdersTables($request, null);

        //2. destroy cart
        Cart::instance('default')->destroy();

        //3. forget coupon
        session()->forget('coupon');

        //4. send email
        Mail::send(new OrderPlaced($order));

        return redirect()->route('confirmation.index')->with('success-message', 'Thank you! Your payment has been successfully accepted!');
        // return view('thankyou');
    }

    protected function addToOrdersTables($request, $error)
    {
        //1. insert into orders table
        $order = Order::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'street' => $request->street,
            'sector' => $request->sector,
            'district' => $request->district,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'discount' => $this->getNumbers()->get('discount'),
            'discount_code' => $this->getNumbers()->get('code'),
            'subtotal' => $this->getNumbers()->get('newSubtotal'),
            'tax' => $this->getNumbers()->get('newTax'),
            'total' => $this->getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        //2. insert into pivot table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = Cart::subtotal() - $discount;
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
