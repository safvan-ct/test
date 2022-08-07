<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Mail\Order;
use App\Models\Address;
use App\Models\Admin\Account;
use App\Models\Admin\Color;
use App\Models\Admin\CouponCode;
use App\Models\Admin\Credential;
use App\Models\Admin\Product;
use App\Models\Admin\Size;
use App\Models\Cart;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Exception\PPConnectionException;

class PaymentController extends Controller
{
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );

        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal()
    {
        // session()->forget('address');
        // $address = Address::find($request->aid);
        // session()->put('address', $address);

        // $total = 0;
        // foreach (session('cart') as $id => $item) {
        //     $total += $item['price'] * $item['quantity'];
        // }

        // if($total < 100)
        // {
        //     $total += 3.50;
        // }


         $total = 0 ;
         foreach((array) session('cart') as $id => $details)
            {
         $total += $details['price'] * $details['quantity'] ;
            }

        $amountToBePaid = $total;



        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // $item_1 = new Item();
        // $item_1->setName('Mobile Payment')->setCurrency('SGD')->setQuantity(1)->setPrice($amountToBePaid);
        // $item_list = new ItemList();
        // $item_list->setItems([$item_1]);

        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($amountToBePaid);
        $redirect_urls = new RedirectUrls();

        /** Specify return URL **/
        $redirect_urls->setReturnUrl(URL::route('status'))->setCancelUrl(URL::route('status'));

        $transaction = new Transaction();

        $transaction->setAmount($amount)->setDescription('Your transaction description');
        //->setItemList($item_list)

        $payment = new Payment();

        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
         
        }
        catch (PPConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::route('/fff');
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('/cc');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        Session::put('error', 'Unknown error occurred');
        return Redirect::route('/bb');
    }

    public function getPaymentStatus(Request $request)
    {
     
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            session()->flash('error', 'Payment failed');
            return Redirect::route('checkout');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);      /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
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
                                    'credential' => 'NO',
                                    'count' => $count,

                                ]);
                            }
                            else
                            {
                                $account = Account::find($id);

                                $account->update([

                                    'count' => $count,

                                ]);

                            }

                        }}



               $test_id= UserOrder::create([
                 'user_id' => auth()->user()->id,
                 'payment_id'=>"",
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
				$semail="mindbare.com";
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
             return Redirect::route('index')->with('status', 'Mail is sent successfully!');
            // return Redirect::route('index');
        }

        session()->flash('error', 'Payment failed');
        return Redirect::route('/qq');
    }
}
