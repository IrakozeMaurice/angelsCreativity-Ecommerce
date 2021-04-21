<?php

namespace App\Listeners;

use App\Coupon;
use App\Jobs\UpdateCoupon;

class CartUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        $coupon_code = session()->get('coupon')['code'];

        if ($coupon_code) {

            $coupon = Coupon::where('code', $coupon_code)->first();

            dispatch_now(new UpdateCoupon($coupon));

            // session()->put('coupon', [
            //     'code' => $coupon->code,
            //     'discount' => $coupon->discount(Cart::subtotal())
            // ]);
        }
    }
}
