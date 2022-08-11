<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use App\Models\Admin\Account;;
use App\Models\Award;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use App\Models\ProductIngredient;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->get();
        $sliders = Slider::where('type', 1)->Orderby('id', 'desc')->get();
        $products = Product::Orderby('id', 'desc')->get();
        $testimonials = Testimonial::Orderby('id', 'desc')->get();
        $blogs = Blog::Orderby('id', 'desc')->get()->take(3);

        return view('index', compact('sliders', 'products', 'testimonials', 'blogs'));
    }

    public function categoryProducts($category_id)
    {
        $sliders = Slider::where('type', 2)->Orderby('id', 'desc')->get();
        $products = Product::where('category_id', $category_id)->get();
        $subcategories = SubCategory::where('category_id', $category_id)->Orderby('id', 'desc')->get();
        $categories = Category::Orderby('id', 'desc')->get();

        return view('shop', compact('products', 'categories', 'subcategories', 'sliders'));
    }

    public function subCategoryProducts($sub_category_id)
    {
        $sub_category = SubCategory::where('id', $sub_category_id)->first();

        $sliders = Slider::where('type', 2)->Orderby('id', 'desc')->get();
        $products = Product::where('sub_category_id', $sub_category_id)->get();
        $subcategories = SubCategory::where('category_id', $sub_category->category_id)->Orderby('id', 'desc')->get();
        $categories = Category::Orderby('id', 'desc')->get();

        return view('shop', compact('products', 'categories', 'subcategories', 'sliders'));
    }

    public function productDetails($id)
    {
        $rating = 0;
        $ratingsub = 0;
        $reviews = Review::where('product_id', $id)->where('is_active', 1)->Orderby('id', 'desc')->get();
        $reviewcount = Review::where('product_id', $id)->where('is_active', 1)->Orderby('id', 'desc')->count();
        foreach ($reviews as $r) {
            $ratingsub = $ratingsub + $r->rating;
        }

        if ($reviewcount != 0) {
            $rating = ($ratingsub / $reviewcount);
        }
        $rating = round($rating);
        $ingredients = ProductIngredient::where('product_id', $id)->Orderby('id', 'desc')->get();
        $accounts = Product::where('id', $id)->get();
        $related = Product::Orderby('id', 'desc')->whereNotIn('id', [$id])->get();
        $sliders = Slider::where('type', 2)->Orderby('id', 'desc')->get();

        return view('account_detail', compact('accounts', 'related', 'sliders', 'ingredients', 'rating', 'reviewcount'));
    }
    public function reviewPost(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'pid' => 'required',
            'name' => 'required',
            'email' => 'required',
            'review' => 'required',
            // 'g-recaptcha-response' => 'required',
        ]);

        Review::create([
            'product_id' => $request->pid,
            'rating' => $request->rating,
            'name' => $request->name,
            'email' => $request->email,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('status', 'Review  Successfully Submitted');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termsOfUse()
    {
        return view('terms-of-use');
    }

    public function refundPolicy()
    {
        return view('refund-policy');
    }

    public function deliveryPolicy()
    {
        return view('delivery-policy');
    }

    public function aboutUs()
    {
        $awards = Award::Orderby('id', 'desc')->get();
        return view('about', compact('awards'));
    }

    public function blogs()
    {
        $blogs = Blog::Orderby('id', 'desc')->get();
        return view('blog', compact('blogs'));
    }
    public function blogDetail($id)
    {
        $blogs = Blog::Orderby('id', 'desc')->whereNotIn('id', [$id])->get();
        $blog = Blog::where('id', $id)->first();
        return view('blog-detail', compact('blogs', 'blog'));
    }

    public function contact()
    {
        return view('contact');
    }
    public function contactPost(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required',
        ]);

        $subject = 'Contact Enquiry';
        $message = 'Name : ' . $request->name . '<br>Email : ' . $request->email . '<br>Phone : ' . $request->phone . '<br>Message : ' . $request->message;
        Mail::to('jojiya@mindbare.com')->send(new Order($message, $subject));

        return redirect(route('contact'))->with('status', 'Contact Enquiry  Successfully Submitted');
    }

    public function faq()
    {
        $faqs = Faq::where('product_id', 0)->orderby('id', 'desc')->get();
        return view('faq', compact('faqs'));
    }

    public function profileUpdate()
    {
        return view('profile_edit');
    }

    public function register()
    {
        return view('user.register');
    }

    public function login()
    {
        return view('login');
    }

    public function password()
    {
        return view('password-link');
    }

    public function subscribe(Request $request)
    {
        $subject = 'Subscription';
        $message = '<br>Email : ' . $request->email;
        Mail::to('senoritanewsletter@gmail.com')->send(new Order($message, $subject));

        return redirect(route('index'))->with('status', 'Subscribed');
    }

    public function support()
    {
        return view('support');
    }

    public function search(Request $request)
    {
        $sliders = Slider::where('type', 2)->Orderby('id', 'desc')->get();

        $products = Product::orderby('id', 'desc')->get();
        foreach ($products as $account) {
            $a[] = $account->name;
            $b[] = $account->id;
            $d1[] = $account->description;
            $cat[] = $account->category_id;
            $offer[] = $account->offer;
            $offer_rate[] = $account->offer_price;
            $rate[] = $account->price;

            $image = $account->image1;
            $image_h = explode(',', $image);
            foreach ($image_h as $image_h) {
                if ($image_h != '') {
                    $image_h1 = $image_h;
                }}
            $im[] = $image_h1;
        }

        $q = $request->search;

        $hint = "";
        if ($q !== "") {
            $q = strtolower($q);
            $len = strlen($q);
            $i = 0;
            foreach ($a as $name) {
                if (false !== stripos($name, $q)) {
                    if ($hint === "") {
                        $c[] = $i;
                        $hint = $name;
                    } else {
                        $c[] = $i;
                        $hint .= ',' . $name;
                    }
                }
                $i = $i + 1;
            }

            $j = 0;
            foreach ($d1 as $name) {
                if (false !== stripos($name, $q)) {
                    if ($hint === "") {
                        $c[] = $j;
                        $hint = $name;
                    } else {
                        //if(!array_key_exists($j,$c)==true)
                        if (!in_array($j, $c)) {
                            $c[] = $j;
                            $hint .= ',' . $name;
                        }
                    }
                }
                $j = $j + 1;
            }
        }
        // $c=array_unique($c);

        if ($hint === "") {
            return view('search', compact('hint', 'sliders'));
        } else {
            return view('search', compact('hint', 'a', 'b', 'd1', 'cat', 'count', 'im', 'c', 'credential', 'offer', 'rate', 'offer_rate', 'sliders'));
        }
    }
}
