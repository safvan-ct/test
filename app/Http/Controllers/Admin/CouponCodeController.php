<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\CouponCode;
use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    public function index()
    {
        $coupons = CouponCode::Orderby('id', 'desc')->get();
        return view('admin.coupon-code', compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'offer' => 'required',
        ]);
 
        CouponCode::create([
            'code' => $request->code,
            'offer' => $request->offer,
        ]);
 
        return redirect(route('coupon.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $coupon = CouponCode::findOrFail($id);

        $request->validate([
            'code' => 'required',
            'offer' => 'required',
        ]);
 
        $coupon->update([
            'code' => $request->code,
            'offer' => $request->offer,
        ]);
 
        return redirect(route('coupon.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $coupon = CouponCode::findOrFail($id);

        $coupon->delete();
 
        return redirect(route('coupon.index'))->with('success', 'Deleted Successfully');
    }
}
