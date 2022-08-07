<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function myaccount()
    {


        $orders = UserOrder::where('user_id', auth()->user()->id)->get();

        // return view('user.my-account', compact('address', 'orders'));
        return view('profile', compact('orders'));

    }




    public function update(Request $request)
    {
        $request->session()->flash('error', 'Something went wrong please check your data');

        $user = User::find(auth()->user()->id);


        if(!empty($request->password)) {
            if (Hash::check($request->current_password, $user->password)) {
                $request->validate([
                    'current_password' => 'required',
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);

                $user->update([

                    'password' => Hash::make($request->password),
                ]);
            }
            else {
                return redirect(route('myaccount'))->with('error', 'Current password not matching');
            }
        }
        else {
            $request->session()->flash('error', 'Something went wrong please check your data');

        }

        $request->session()->forget('error');
        return redirect(route('myaccount'))->with('status', 'Profile Updated Successfully');
    }

}
