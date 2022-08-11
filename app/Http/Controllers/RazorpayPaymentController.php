<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use App\Models\Admin\Account;
use App\Models\Cart;
use App\Models\UserOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class RazorpayPaymentController extends Controller
{
    public function checkout()
    {
        $cart_items = [];
        if (auth()->check() && auth()->user()->role_id == 2) {
            if (session('cart')) {
                foreach (session('cart') as $id => $data) {
                    $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->first();
                    $cart = is_null($cart) ? new Cart : $cart;
                    $data['user_id'] = auth()->user()->id;
                    unset($data['id']);
                    $cart->updateOrCreate(['id' => $cart->id], $data);
                }
            }

            $cart_items = Cart::where('user_id', auth()->user()->id)->get()->toArray();
        } else if (session('cart')) {
            $cart_items = session('cart');
        }

        return view('checkout')->with('cart_items', $cart_items);
    }

    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'apartment' => 'required',
            'city' => 'required',
            'postcode' => 'required|digits:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'apartment' => $request->apartment,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
        ];

        $cart_items = [];
        if (auth()->check() && auth()->user()->role_id == 2) {
            if (session('cart')) {
                foreach (session('cart') as $id => $data) {
                    $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->first();
                    $cart = is_null($cart) ? new Cart : $cart;
                    $data['user_id'] = auth()->user()->id;
                    unset($data['id']);
                    $cart->updateOrCreate(['id' => $cart->id], $data);
                }
            }

            $cart_items = Cart::where('user_id', auth()->user()->id)->get()->toArray();
        } else if (session('cart')) {
            $cart_items = session('cart');
        }

        return view('razorpayView', compact('data', 'cart_items'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $total = 0;
        foreach ((array) session('cart') as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $amountToBePaid = $total;

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                $total = 0;
                $pids = " ";
                $pname = " ";
                $pquantity = "";
                $pprice = "";
                date_default_timezone_set("Asia/Calcutta");
                $current_date = date('Y-m-d H:i:s');
                foreach ((array) session('cart') as $id => $details) {
                    $total += $details['price'] * $details['quantity'];
                    $pids = $pids . ',' . $id;
                    $pname = $pname . ',' . $details['name'];
                    $pquantity = $pquantity . ',' . $details['quantity'];
                    $pprice = $pprice . ',' . $details['price'];

                }

                $amountToBePaid = $total;

                $ids = explode(',', $pids);
                $pquantity1 = explode(',', $pquantity);
                $i = 0;
                foreach ($ids as $ids) {
                    if ($ids != " ") {
                        $i++;
                        $items = Account::Orderby('id', 'desc')->where('id', [$ids])->get();
                        foreach ($items as $item) {
                            $pname1 = $item['name'];

                        }

                    }}

                if (auth()->user() != null) {

                    $test_id = UserOrder::create([
                        'first_name' => $request->name,

                        'address' => $request->address . ',' . $request->apartment,
                        'city' => $request->city,

                        'postcode' => $request->postcode,
                        'phone' => $request->phone,
                        'status' => "new",
                        'email' => $request->email,
                        'user_id' => auth()->user()->id,
                        'payment_id' => $input['razorpay_payment_id'],
                        'pay_amount' => $amountToBePaid,
                        'date' => $current_date,
                        'product' => $pname,
                        'ptprice' => $pprice,
                        'pid' => $pids,
                        'pquantity' => $pquantity,
                        'orderid' => "",

                    ]);
                } else {
                    $test_id = UserOrder::create([
                        'first_name' => $request->name,

                        'address' => $request->address . ',' . $request->apartment,
                        'city' => $request->city,

                        'postcode' => $request->postcode,
                        'phone' => $request->phone,
                        'status' => "new",
                        'email' => $request->email,

                        'payment_id' => $input['razorpay_payment_id'],
                        'pay_amount' => $amountToBePaid,
                        'date' => $current_date,
                        'product' => $pname,
                        'ptprice' => $pprice,
                        'pid' => $pids,
                        'pquantity' => $pquantity,
                        'orderid' => "",

                    ]);
                }

                $date = date('Y-m-d, h:s:i a');
                $order = UserOrder::findOrFail($test_id->id);
                $amountToBePaid = $order->pay_amount;

                $subjectt = 'Order Received';
                $messagee = 'New Order from ' . $request->email . '  Bill Amount : $' . $amountToBePaid . '/-';
                Mail::to('senoritaproductorders@gmail.com')->send(new Order($messagee, $subjectt));

                $subject = 'Order confirmed';
                $message = 'Thanks for shopping with us! Your order is confirmed and will be shipped shortly. Bill Amount : $' . $amountToBePaid . '/-';
                if (auth()->user() != null) {
                    Mail::to(auth()->user()->email)->send(new Order($message, $subject));
                } else {
                    Mail::to($request->email)->send(new Order($message, $subject));

                }

                //Cart::where('user_id', auth()->user()->id)->delete();
                session()->forget('cart');
                return Redirect::route('cart')->with('status', 'Order Submitted successfully!');
                // return Redirect::route('index')
            } catch (Exception $e) {
                return $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
