<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use App\Models\Admin\Account;
use App\Models\Admin\Credential;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
   
        //  $name = $_POST['name'];
        //   $email= $_POST['email'];
        //  dd($name);

        // $token = $_POST['stripeToken'];
        $total = 0 ;
        foreach((array) session('cart') as $id => $details)
           {
        $total += $details['price'] * $details['quantity'] ;
           }

       $amountToBePaid = $total;
      $customer = \Stripe\Customer::create(array(
    'name' =>$_POST['name'],
    'description' => 'GameHuksters',
    'email' => $_POST['email'],
    "source" => $request->stripeToken,
    "address" => ["city" => "hyd", "country" => "US", "line1" => "adsafd werew", "postal_code" => "500090", "state" => "telangana"]
));

$paymentIntent = \Stripe\PaymentIntent::create([
    'amount' => $total*100,
    'currency' => 'usd',
    'payment_method_types' => [
        'card',
    ],
]);

$charge =  Stripe\Charge::create ([
            'customer' => $customer->id,
                "amount" =>$total*100,
                "currency" => "usd",

                "description" => "game Hucksters"
        ]);



        if($charge['status'] == "succeeded"){
            session()->flash('status', 'Ordered successfully');

                $total = 0 ;
                $pids=" ";
                $pname=" ";
                $pquantity="";
                $pprice="";
                date_default_timezone_set("Asia/Calcutta");
                $current_date = date('Y-m-d H:i:s');
                foreach((array) session('cart') as $id => $details)
                     {
                    $total += $details['price'] * $details['quantity'] ;
                    $pids=$pids.','.$id;
                    $pname=$pname.','.$details['name'];
                    $pquantity=$pquantity.','.$details['quantity'];
                    $pprice=$pprice.','.$details['price'];

                         }

                    $amountToBePaid = $total;



                    $ids = explode(',', $pids);
                    $pquantity1 = explode(',', $pquantity);
                    $i=0;
                    foreach ($ids as $ids)
                    {
                        if ($ids != " ")
                        {
                            $i++;
                            $items = Account::Orderby('id', 'desc')->where('id', [$ids])->get();
                            foreach($items as $item)
                            {
                                $pname1=$item['name'];

                                $count = $item['count'];
                            }


                            $count=$count-$pquantity1[$i];


                            if($count<=0)
                            {
                                $account = Account::find($id);

                                $account->update([
                                    'credential' => 'no',
                                    'count' => $count,

                                ]);
                            }
                            else
                            {
                                $account = Account::find($id);

                                $account->update([

                                    'count' => $count,

                                ]);
                                // dd($account);

                            }

                        }}



             $test_id=UserOrder::create([
                 'user_id' => auth()->user()->id,
                 'payment_id'=>$charge['id'],
                 'pay_amount'=>$amountToBePaid,
                 'date'=>$current_date,
                 'product'=>$pname,
                 'ptprice'=>$pprice,
                 'pid'=>$pids,
                 'pquantity'=> $pquantity,
                 'orderid'=>"",




             ]);


				$acc_email="";
				$acc_email_password="";
				$acc_stream_username="";
				$acc_stream_password="";
				$pname="";
				$pid2 = explode(',', $pids);

				$pquantity2 = explode(',',$pquantity);
				$i=-1;
				foreach ($pid2 as $pid2)
				{ $i++;

					if ($pid2 != " ")
					{
                        // $datacredential = Credential::Orderby('id', 'desc')->where('pid', [$pid2])->whereNotIn('send', 'yes') ->get()->limit($pquantity1[$i]);
                        $datacredential = Credential::where('pid', [$pid2])->whereNotIn('send', ['yes'])->limit($pquantity1[$i])->get();


						if ($datacredential != null)
						{   $n=1;
						foreach($datacredential as $datacredentials)
							{
								$cid = $datacredentials['id'];
								$pid = $datacredentials['pid'];
								$ac_email = $datacredentials['email'];
								$acc_email = $acc_email.','.$ac_email;

								$email_password= $datacredentials['email_password'];
								$password1="mindjosafansimiranjithnideeshmelvinsnehagame";
								$email_password_de=openssl_decrypt($email_password ,"AES-128-ECB",$password1);

								$acc_email_password = $acc_email_password.','.$email_password_de;

								$stream_username = $datacredentials['stream_username'];
								$acc_stream_username = $acc_stream_username.','.$stream_username;

								$stream_password = $datacredentials['stream_password'];
								$password2="gamesafanjosimiranjithnideeshmelvinsnehamind";
								$stream_password_de=openssl_decrypt($stream_password ,"AES-128-ECB",$password2);

								$acc_stream_password = $acc_stream_password.','.$stream_password_de;


                                $credentialupdate = Credential::find($cid);

                                $credentialupdate->update([
                                    'send' => 'yes',


                                ]);

                                $accountdetails = Account::Orderby('id', 'desc')->where('id', [$pid2])->get();


							foreach($accountdetails as $accountdetailss)
                            {

										$pname1=$accountdetailss['name'];

										$pname = $pname.','.$pname1;


									}
								}}}



					}

				$msg="";
				$pname1 = explode(',', $pname);
				$acc_email1 = explode(',', $acc_email);
				$acc_email_password1 = explode(',', $acc_email_password);
				$acc_stream_username1 = explode(',', $acc_stream_username);
				$acc_stream_password1 = explode(',', $acc_stream_password);
				$j=0;
				foreach ($acc_email1 as $acc_emails)
				{

					if($pname1[$j] !=""){
						$msg = $msg.'<tr><td>------------------------------</td></tr><tr><td><b>'.$pname1[$j].'</b></td></tr><tr><td>Original Email:&nbsp;&nbsp;'.$acc_email1[$j].'</td></tr><tr><td>Email password:&nbsp;&nbsp;'.$acc_email_password1[$j].'</td></tr><tr><td>Stream Username:&nbsp;&nbsp;'.$acc_stream_username1[$j].'</td></tr><tr><td>Stream Password:&nbsp;&nbsp;'.$acc_stream_password1[$j];



					}

					$j++;


				}

				//echo $msg;

				//echo "hai";
                $orderid=$test_id->id;
				$to = auth()->user()->email;
				$semail="GameHucksters";
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= "From: " . $semail . "\r\n"; // Sender's E-mail
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$subject="Purchase Confirmation";

				$message ='<table style="width:100%">
				<tr>
				<td>   Hi '.auth()->user()->name.',</td>
				</tr>
				<tr>
				<td>  Thanks for the Purchase.Here is the product details .</td>
				</tr>
				<tr><td>Your Order id :'.$orderid.'</td></tr>
				<tr><td></td></tr>'.$msg.'</td></tr>

				<tr><td>Enjoy Gaming </td></tr>
				<tr><td>Team Game Hucksters </td></tr>

				</table>';



				if (@mail($to, $subject, $message, $headers))
				{
				//echo 'Your message has been sent.';
				}else{
				//echo 'failed';
				}



            $subject = 'New Order';
            $message = 'New Order Received. Bill Amount : $'.$amountToBePaid.'/-';
            Mail::to('jojiyajoseph1996@email.com')->send(new Order($message, $subject));








            // $subject = 'Order confirmed';
            // $message = 'Thanks for shopping with us! Your order is confirmed and will be shipped shortly. Bill Amount : $'.$amountToBePaid.'/-';
            // Mail::to(auth()->user()->email)->send(new Order($message, $subject));

            // Cart::where('user_id', auth()->user()->id)->delete();
            session()->forget('cart');

             return Redirect::route('index')->with('status', 'Payment successfull.');
            // return Redirect::route('index');
        }
        else
        {

        }

        return back();
    }
}
