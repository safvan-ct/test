<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Order;
use App\Models\Admin\Account;
use App\Models\Review;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ListController extends Controller
{
    public function user()
    {
        $users = User::Orderby('id', 'desc')->get();
        return view('admin.web.user-list', compact('users'));
    }
    
    
      public function userban($id)
    {
         $user = User::find($id);
        
          $user->update([

                    'ban' => 1,
                ]);

      return redirect()->back()->with('status', 'User Baned Successfully');
        
    }
    
       public function userunban($id)
    {
        
         $user = User::find($id);
         
          $user->update([

                    'ban' => 0,
                ]);

      return redirect()->back()->with('status', 'User UnBaned Successfully');
        
    }

    // public function review()
    // {
    //     $reviews = Review::Orderby('id', 'desc')->get();
    //     return view('admin.web.review-list', compact('reviews'));
    // }

    // public function approve($id)
    // {
    //     $review = Review::findOrFail($id);

    //     if($review->status == 0)  {
    //         $review->update(['status' => 1]);
    //         return back()->with('success', 'Review Approved Successfully');
    //     }
    //     else {
    //         $review->update(['status' => 0]);
    //         return back()->with('success', 'Review Dis-Approved Successfully');
    //     }

    // }

    public function neworder()
    {

            $products=Account::orderby('id', 'desc')->get();
             $orders = UserOrder::Orderby('id', 'desc')-> where('user_orders.status', "new")->get(['user_orders.*']);
            $users=User::Orderby('id', 'desc')->get();
            // $orders = UserOrder::join('users','users.id', '=','user_orders.user_id')->Orderby('id', 'desc')->where('user_orders.status', "new")->get(['user_orders.*', 'users.name','users.email']);
            return view('admin.new-order', compact('orders','products','users'));

    }

 public function shippedorder()
    {

            $products=Account::orderby('id', 'desc')->get();
            $orders = UserOrder::Orderby('id', 'desc')-> where('user_orders.status', "shipped")->get(['user_orders.*']);
            $users=User::Orderby('id', 'desc')->get();
           // $orders = UserOrder::join('users','users.id', '=','user_orders.user_id')->Orderby('id', 'desc')->where('user_orders.status', "shipped")->get(['user_orders.*', 'users.name','users.email']);
            return view('admin.new-order', compact('orders','products','users'));

    }
    
     public function order()
    {

            $products=Account::orderby('id', 'desc')->get();
               $orders = UserOrder::Orderby('id', 'desc')-> where('user_orders.status', "delivered")->get(['user_orders.*']);
            $users=User::Orderby('id', 'desc')->get();
            //$orders = UserOrder::join('users','users.id', '=','user_orders.user_id')->Orderby('id', 'desc')->where('user_orders.status', "delivered")->get(['user_orders.*', 'users.name','users.email']);
            return view('admin.new-order', compact('orders','products','users'));

    }
    
    
    public function status($id, $type)
    {
        if($type == 'shipped')
        {
            $date = date('Y-m-d h:s:i');
            $order = UserOrder::findOrFail($id);
            $order->update(['status' => 'shipped', 'shipped_at' => $date]);
            $amountToBePaid = $order->pay_amount;

            $subject = 'Order shipped';
            $message = 'Thanks for shopping with us! Your order is shipped and will be delivered shortly.  Bill Amount : $'.$amountToBePaid.'/-';
           Mail::to($order->user->email)->send(new Order($message, $subject));

            return back()->with('success', 'Order shipped Successfully');
        }

        if($type == 'delivered')
        {
            $order = UserOrder::findOrFail($id);
            $order->update(['status' => 'delivered']);

            $subject = 'Order delivered';
            $message = 'Thanks for shopping with us! Your order is delivered.';
            Mail::to($order->user->email)->send(new Order($message, $subject));

            return back()->with('success', 'Order delivered Successfully');
        }
    }
}
