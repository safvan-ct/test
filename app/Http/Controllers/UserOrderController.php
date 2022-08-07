<?php

namespace App\Http\Controllers;

use App\Models\Admin\CouponCode;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order;

class UserOrderController extends Controller
{
    public function GetCoupon($code)
    {
        $total = 0;
        foreach (session('cart') as $id => $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $coupon = CouponCode::where('code', $code)->first();
        if($coupon) {
            $offer = $coupon->offer;

            $OfferPrice = ( $total - ( $total * $offer / 100 ));

            return json_encode(compact("offer", "OfferPrice"));
        }
        else {
            $error = "invalid Coupon";
            return json_encode(compact("error"));
        }
    }

    public function OrderPay(Request $request)
    {
        $request->session()->flash('error', 'Something went wrong please check your data');

        $total = 0;
        foreach (session('cart') as $id => $item) {
            $total += $item['price'] * $item['quantity'];
            $pid[] = $id;
            $name[] = $item['name'];
            $quantity[] = $item['quantity'];
            $price[] = $item['price'];
            $image[] = $item['image'];
        }

        $offer_price = $total; $offer = '';
        $coupon = CouponCode::where('code', $request->code)->first();

        if($coupon) {
            $offer = $coupon->offer;
            $offer_price = ( $total - ( $total * $offer / 100 ));
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'min:10', 'max:12'],
            'address' => ['required'],
        ]);

        UserOrder::create([
            'user_id' => auth()->user()->id,

            'product_id' => implode(',', $pid),
            'product_name' => implode('@p', $name),
            'product_qty' => implode(',', $quantity),
            'product_price' => implode(',', $price),
            'product_image' => implode(',', $image),
            'product_total' => $total,

            'coupon_code' => $request->code,
            'coupon_offer' => $offer,

            'offer_price' => $offer_price,

            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $message = 'New Order Recieved';
        $subject = 'New Order';
        Mail::to('')->send(new Order($message, $subject));

        $message = 'Ordere successfully recieved';
        $subject = 'Order confirmed';
        Mail::to(auth()->user()->email)->send(new Order($message, $subject));

        return redirect(route('index'))->with('status', 'Order Successfully');
    }
}
