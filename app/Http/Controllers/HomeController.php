<?php

namespace App\Http\Controllers;

use App\Models\Admin\Banner;
use App\Models\Admin\Category;
use App\Models\Admin\OfferBanner;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use App\Models\Admin\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order;
use App\Models\Address;
use App\Models\Admin\Account;
use App\Models\Admin\News;
use App\Models\Admin\Review;
use App\Models\Admin\Privacypolicy;
use App\Models\Admin\Refund;
use App\Models\Admin\Terms;
use App\Models\Admin\Adv;
use App\Models\Admin\Slider;
use Illuminate\Support\Facades\Redirect;
use App\Models\Support;
use App\Models\Admin\Subcat;
use App\Models\Admin\Game;
use App\Models\Admin\Homeabout;
use App\Models\Admin\Homequiz;
use App\Models\Admin\Aboutus;
use App\Models\Admin\Deliverypolicy;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //session()->flush();
        $products=Account::inRandomOrder()->get();
        $sliders = Slider::Orderby('id', 'desc')->get();
        $catf =DB::table('homecat1')->Orderby('id', 'desc')->first();
        $cats =DB::table('homecat2')->Orderby('id', 'desc')->first();
        $subcats =DB::table('homesubcat1')->Orderby('id', 'desc')->first();


      $products = Account::Orderby('accounts.id', 'desc')->get();
      $games=Game::Orderby('id', 'desc')->get();
      $subcategories = Category::Orderby('id', 'desc')->get();


        $testimonials = Testimonial::Orderby('id', 'desc')->get();
        $banners = Adv::Orderby('id', 'desc')->first();
        $homeabouts = Homeabout::Orderby('id', 'desc')->first();
        $homequizs = Homequiz::Orderby('id', 'desc')->first();
        // $subcategory= Category::Orderby('id', 'desc')->first();
         $newss = News::Orderby('id', 'desc')->get()->take(3);
         $testimonial = Testimonial::Orderby('id', 'desc')->get();

        return view('index',compact('sliders','games','products','subcats','testimonials','cats','catf','banners','homeabouts','homequizs','subcategories','newss','testimonial'));
    }
  public function profileedit()
    {
        return view('profile_edit');
    }

    public function register()
    {
        return view('user.register');
    }

    public function about()
    {
         $datas =DB::table('awards')->Orderby('id', 'desc')->get();
         $aboutus = Aboutus::Orderby('id', 'desc')->first();
        return view('about',compact('aboutus','datas'));
    }

     public function News()
    {
        $newss = News::Orderby('news.id', 'desc')->get();
        return view('news',compact('newss'));
    }

      public function faq()
    {
       
        $faqs=DB::table('faqs')->orderby('id','desc')->get();
        return view('faq',compact('faqs'));
    }



    public function newsdetail($id)
    {

        $items = News::Orderby('id', 'desc')->whereNotIn('id', [$id])->get();
        $newss = News::where('id',$id)->Orderby('id', 'desc')->get();
        return view('news_detail',compact('newss','items'));
    }

    public function Account_details($id)
    {
        $rating=0;
        $ratingsub=0;
        $reviews=Review::where('pid',$id)->Orderby('id', 'desc')->get();
        $reviewcount=Review::where('pid',$id)->Orderby('id', 'desc')->count();
        foreach($reviews as $r)
        {
           $ratingsub= $ratingsub+$r->rating;
        }
       
        if($reviewcount !=0)
        {
        $rating=($ratingsub/$reviewcount);
        }
        $rating=round($rating);
        $ingredients =DB::table('ingredients')->Orderby('id', 'desc')->get();
        // $accounts=Account::join('brands', 'brands.id', '=', 'accounts.brand')->where('accounts.id', $id)->get(['accounts.*', 'brands.title']);
        $accounts=Account::where('accounts.id', $id)->get();
        $related = Account::Orderby('id', 'desc')->whereNotIn('id', [$id])->get();
        $sliders =  DB::table('bestsaleslider')->Orderby('id', 'desc')->get();

        return view('account_detail',compact('accounts','related','sliders','ingredients','rating','reviewcount'));
    }

    public function shopCat($cat)
    { $sliders =  DB::table('bestsaleslider')->Orderby('id', 'desc')->get();

         $products=Account::where('subcat_id', $cat)->get(['accounts.*']);
         $subcategories= Category::where('game', $cat)->Orderby('id', 'desc')->get();
         $cats = Game::Orderby('id', 'desc')->get();
         return view('shop', compact('products','cats','subcategories','sliders'));
    }


    //  public function shopCatsubcat($cat)
    // {
    //      $brands = Brand::Orderby('id', 'desc')->get();
    //   $accounts=Account::where('subcat_id', $cat)->get(['accounts.*']);

    //      $subcats= Subcat::join('accounts', 'accounts.subcat_id', '=', 'subcats.id')->distinct()->Orderby('subcats.id', 'desc')->get(['subcats.*']);

    //     return view('shop', compact('accounts','subcats','brands'));

    // }


    //  public function shopCatsubcatall($cat)
    // {
    //      $brands = Brand::Orderby('id', 'desc')->get();
    //   $accounts=Account::where('cat_id', $cat)->get(['accounts.*']);

    //      $subcats= Subcat::join('accounts', 'accounts.subcat_id', '=', 'subcats.id')->distinct()->Orderby('subcats.id', 'desc')->get(['subcats.*']);
    //     return view('shop', compact('accounts','subcats','brands'));
    // }


    public function shop($cat)
    {
        $sliders =  DB::table('bestsaleslider')->Orderby('id', 'desc')->get();

        $subcategories= Category::where('game', $cat)->Orderby('id', 'desc')->get();
        $accounts=Account::where('cat_id', $cat)->Orderby('accounts.id', 'desc')->get(['accounts.*']);
        return view('subcategory', compact('accounts','subcategories','sliders'));
    }


    // public function shopsort(Request $reuest)
    // {

    //     if($reuest->sort=="low"){
    //         $accounts=Account::join('brands', 'brands.id', '=', 'accounts.brand')->Orderby('offer_rate', 'desc')->get(['accounts.*', 'brands.title']);

    //     }
    //     elseif($reuest->sort=="high"){
    //         $accounts=Account::join('brands', 'brands.id', '=', 'accounts.brand')->Orderby('offer_rate', 'asc')->get(['accounts.*', 'brands.title']);

    //     }
    //     else{
    //         $accounts=Account::join('brands', 'brands.id', '=', 'accounts.brand')->Orderby('accounts.id', 'desc')->get(['accounts.*', 'brands.title']);

    //     }

    //     return view('shop', compact('accounts'));
    // }

    // public function shopsubCat($subcat)
    // {
    //     $cat = SubCategory::find($subcat);
    //     $cat = $cat->category_id;
    //     $products = Product::where('sub_category_id', $subcat)->paginate(16);
    //     $featured = Product::where('status', 'featured')->take(3)->get();
    //     $categories = SubCategory::with('products')->where('category_id', $cat)->get();

    //     return view('shop', compact('products', 'featured', 'categories', 'subcat', 'cat'));
    // }

    // public function product($id)
    // {
    //     $userReview = '';
    //     if(auth()->check())
    //     {
    //         $userReview = Review::where(['user_id' => auth()->user()->id, 'product_id' => $id])->get();
    //     }

    //     $product = Product::with('category', 'subCategory')->findOrFail($id);
    //     $featured = Product::where('status', 'featured')->get();

    //     return view('product', compact('product', 'featured', 'userReview'));
    // }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        // $address = Address::where('user_id', auth()->user()->id)->get();
        // return view('checkout', compact('address'));
        return view('checkout');
    }

    public function login()
    {
        return view('login');
    }

    public function password()
    {
        return view('password-link');
    }

    public function contact()
    {
        return view('contact');
    }
    
    
      public function subscribe(Request $request)
    {

        // $request->validate([
        //     'g-recaptcha-response' => 'required',
        //  ]);

        $subject = 'Subscription';
        $message = '<br>Email : '.$request->email;
        Mail::to('senoritanewsletter@gmail.com')->send(new Order($message, $subject));

        return redirect(route('index'))->with('status', 'Subscribed');
    }

    public function contactPost(Request $request)
    {

        $request->validate([
            'g-recaptcha-response' => 'required',
         ]);

        $subject = 'Contact Enquiry';
        $message = 'Name : '.$request->name. '<br>Email : '.$request->email. '<br>Phone : '.$request->phone. '<br>Message : '.$request->message;
        Mail::to('jojiya@mindbare.com')->send(new Order($message, $subject));

        return redirect(route('contact'))->with('status', 'Contact Enquiry  Successfully Submitted');
    }

    public function search(Request $request)
    {
        $sliders =  DB::table('bestsaleslider')->Orderby('id', 'desc')->get();


        $accounts=Account::orderby('id','desc')->get();
        foreach($accounts as $account){
            $a[] = $account->name;
            $b[] = $account->id;
            $d1[] = $account->description;
            $cat[] = $account->cat_id;
            $count[] = $account->count;
            $credential[] = $account->credential;
            $offer[] = $account->offer;
            $offer_rate[] = $account->offer_rate;
            $rate[] = $account->rate;

            $description[] = $account->specification;
            $image= $account->image;
             $image_h = explode(',', $image);
						foreach ($image_h as $image_h)
                              {
                                if ($image_h != '')
                                {
			                            $image_h1=$image_h;
                                    }}
										$im[]=$image_h1;
                                }

		  $q=$request->search;
	
          $hint = "";
          if ($q !== "")
          {
            $q = strtolower($q);
            $len=strlen($q);
            $i=0;
            foreach($a as $name)
            {


            if (false !== stripos( $name, $q) )
              {

                if ($hint === "")
                {
                  $c[]= $i;
                  $hint = $name;
                }
                else
                {
                  $c[]= $i;
                  $hint .= ','.$name;
                   
                  
                }
                 
              }
              $i=$i+1;
            }
            
                $j=0;
             foreach($d1 as $name)
            {


            if (false !== stripos( $name, $q) )
              {

                if ($hint === "")
                {
                  $c[]= $j;
                  $hint = $name;
                }
                else
                {
                //if(!array_key_exists($j,$c)==true)
                  if(!in_array($j, $c))
                   {
                       
                  $c[]= $j;
                  $hint .= ','.$name; 
                       
                   }
                  
                }
                 
              }
              $j=$j+1;
            }
          }
          
         // $c=array_unique($c);



          if($hint === "" ){
           return view('search',compact('hint','sliders'));
              }
          else
              {
          return view('search',compact('hint','a','b','d1','cat','count','im','c','credential','offer','rate','offer_rate','sliders'));
             }
    }
    public function privacy()
    {
        $privacy= Privacypolicy::Orderby('id', 'desc')->get();
        return view('privacy-policy',compact('privacy'));
    }
    
     public function delivery()
    {
        $deliverys= Deliverypolicy::Orderby('id', 'desc')->get();
        return view('delivery-policy',compact('deliverys'));
    }

    public function support()
    {
        return view('support');

    }
    
    
        public function review(Request $request)
    {

        $request->validate([
            
            'g-recaptcha-response' => 'required',
         ]);

        Review::create([
             'rating'=>$request->rating,
            'pid'=>$request->pid,
            'name' => $request->name,
             'email' => $request->email,
              'review' => $request->review,

        ]);


        return redirect()->back()->with('status', 'Review  Successfully Submitted');
    }
    
    

    //     public function supportPost(Request $request)
    // {

    //     $request->validate([
    //          'phone' => ['required', 'min:10', 'max:12'],
    //         'g-recaptcha-response' => 'required',
    //      ]);

    //      Support::create([
    //         'name' => $request->name,
    //          'email' => $request->email,
    //           'phone' => $request->phone,
    //           'message' => $request->message,

    //     ]);


    //     $subject = 'Support center Enquiry';
    //     $message = 'Name : '.$request->name. '<br>Email : '.$request->email. '<br>Phone : '.$request->phone. '<br>Message : '.$request->message;
    //     Mail::to('jojiyajoseph1996@gmail.com')->send(new Order($message, $subject));

    //     return redirect(route('support'))->with('status', 'Support Enquiry  Successfully Submitted');
    // }

    public function refund()
    {
        $policy= Refund::Orderby('id', 'desc')->get();
        return view('refund-policy',compact('policy'));

    }

    public function terms()
    {
        $policy= Terms::Orderby('id', 'desc')->get();
        return view('terms-of-use',compact('policy'));

    }

    // public function whatsapp(Request $request)
    // {
    //     $name = $request->name;
    //     $phone = $request->phone;
    //     $msg = 'Name : '.$name.'%0aPhone : '.$phone.'%0aHi, I would like to know about';
    //     return Redirect::to('https://wa.me/+6593694289?text='.$msg);
    // }
}
