<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    public function store(Request $request)
    {

        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again');
        }

        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success-message', 'Coupon has been applied!');
    }

    public function destroy()
    {
        session()->forget('coupon');
        return back()->with('success-message', 'coupon has been removed');
    }
}
