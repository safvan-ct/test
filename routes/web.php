<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

// Route::get('/link', [ArtisanController::class, 'link']);

Route::get('/link', function() {
    $fromFolder = storage_path("app/public");
    $toFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    if(!File::exists($toFolder)) {
        symlink($fromFolder, $toFolder);
        return redirect(route('home.index'));
    }
    return ('Storage folder already exist in public_html, delete Storage folder and refresh');
});

Route::post('/Supports', [HomeController::class, 'supportPost'])->name('supports');

Route::get('/updateapp', function()
{
    Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});


//Route::post('razorpay-billing', [RazorpayPaymentController::class, 'billing'])->name('billing');
Route::post('razorpay-payments', [RazorpayPaymentController::class, 'index'])->name('razorpay.payment.index');
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

Route::get('/payments', [StripeController::class, 'stripe'])->name('stripepayments');
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');


Route::get('/FAQ', [HomeController::class, 'faq'])->name('faq');
Route::get('/Blogs', [HomeController::class, 'News'])->name('news');

Route::get('/Register', [HomeController::class, 'register'])->name('registerpage');
Route::get('/payment', [PaymentController::class, 'payWithpaypal'])->name('payment');
Route::get('/payment/status', [PaymentController::class, 'getPaymentStatus'])->name('status');
Route::get('News Details/{id}', [HomeController::class, 'newsdetail'])->name('new_detail');
Route::post('Products', [HomeController::class, 'search'])->name('search');

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('add-to-cart/{id}', [CartController::class, 'adddetailToCart'])->name('adddetail.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
// Route::post('/cart-add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::post('/cart-update', [CartController::class, 'updateCart'])->name('cart.update');
// Route::post('/cart-remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('razorpay-payments', [RazorpayPaymentController::class, 'index'])->name('paymentindex');
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/shop-cat/{cat}', [HomeController::class, 'shopCat'])->name('shopcat');


Route::get('/shop-cats/{cat}', [HomeController::class, 'shopCatsubcat'])->name('shopcatsubcat');
Route::get('/shop-catsall/{cat}', [HomeController::class, 'shopCatsubcatall'])->name('shopcatsubcatall');


Route::get('/shop/{cat}', [HomeController::class, 'shop'])->name('shop');
//Route::post('/shop', [HomeController::class, 'shopsort'])->name('shop_sort');
Route::get('/Details/{id}', [HomeController::class, 'Account_details'])->name('account_details');
Route::post('/Checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/Checkout', [HomeController::class, 'checkout'])->name('checkout');


Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::post('/Review', [HomeController::class, 'review'])->name('review');
Route::post('/contact', [HomeController::class, 'contactPost'])->name('contact');

Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');

Route::get('/Delivery-policy', [HomeController::class, 'delivery'])->name('delivery');


Route::get('/support', [HomeController::class, 'support'])->name('support');
Route::get('/refund-policy', [HomeController::class, 'refund'])->name('refund');
Route::get('/terms-of-use', [HomeController::class, 'terms'])->name('terms');
Route::post('/whatsapp', [HomeController::class, 'whatsapp'])->name('whatsapp');
Route::get('/profile edit', [HomeController::class, 'profileedit'])->name('profileedit');
Route::get('/news_detail', [HomeController::class, 'news_detail'])->name('news_detail');



Auth::routes(['verify' => true]);
Route::group(['middleware' => 'verified'], function(){
    Route::get('/my-account', [UserController::class, 'myaccount'])->name('myaccount');
    Route::post('/user', [UserController::class, 'update'])->name('user.update');

    // Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/coupon/{code}', [UserOrderController::class, 'GetCoupon'])->name('get.coupon');
    Route::post('/order', [UserOrderController::class, 'OrderPay'])->name('order');

    Route::resource('/address', AddressController::class, ['names' => 'address']);
    Route::resource('/review', ReviewController::class, ['names' => 'review']);
});

Route::get('/admin', [Admin\AdminController::class, 'index'])->name('admin.login');
Route::post('/admin', [Admin\AdminController::class, 'login'])->name('admin.login');
Route::get('/admin-logout', [Admin\AdminController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){
    Route::resource('profile', Admin\ProfileController::class, ['names' => 'profile']);

    Route::get('home/{type?}', [Admin\AdminHomeController::class, 'index'])->name('dashboard');

    // Website managment
    Route::get('/slider', [Admin\SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/results', [Admin\SliderController::class, 'result'])->name('slider.result');
    Route::post('/slider/create-update', [Admin\SliderController::class, 'createUpdate'])->name('slider.create.update');

    Route::resource('BestsaleSlider', Admin\BestsalesliderController::class, ['names' => 'bestsaleslider']);
    Route::resource('Flash', Admin\FlashController::class, ['names' => 'flash']);
    Route::resource('News', Admin\NewsController::class, ['names' => 'news']);
    Route::resource('Advertisement', Admin\AdvController::class, ['names' => 'adv']);
    Route::resource('offer-banner', Admin\OfferBannerController::class, ['names' => 'offer']);
    Route::resource('homeabout', Admin\HomeaboutController::class, ['names' => 'homeabout']);
    Route::resource('homecat1', Admin\Homecat1Controller::class, ['names' => 'homecat1']);
    Route::post('homecat1/{id}', [Admin\Homecat1Controller::class, 'update'])->name('homecat1s.update');
    Route::resource('homecat2', Admin\Homecat2Controller::class, ['names' => 'homecat2']);
    Route::post('homecat2/{id}', [Admin\Homecat2Controller::class, 'update'])->name('homecat2s.update');
    Route::resource('homesubcat1', Admin\Homesubcat1Controller::class, ['names' => 'homesubcat1']);
    Route::post('homesubcat1/{id}', [Admin\Homesubcat1Controller::class, 'update'])->name('homesubcat1s.update');
    Route::resource('Aboutsus', Admin\AboutusController::class, ['names' => 'aboutus']);
    Route::resource('Award', Admin\AwardimageController::class, ['names' => 'awardimage']);
    Route::resource('homequiz', Admin\HomequizController::class, ['names' => 'homequiz']);
    Route::resource('testimonial', Admin\TestimonialController::class, ['names' => 'testimonial']);
    Route::resource('SocialMedia', Admin\SocialMediaController::class, ['names' => 'socialmedia']);
    Route::resource('seo', Admin\SeoController::class, ['names' => 'seo']);
    Route::resource('Delivery_Policy', Admin\DeliverypolicyController::class, ['names' => 'deliverys']);
    Route::resource('Privacy Policy', Admin\PrivacypolicyController::class, ['names' => 'privacy']);
    Route::post('Privacy policyyy/{id}', [Admin\PrivacypolicyController::class, 'update'])->name('privacy_update');
    Route::resource('RefundPolicy', Admin\RefundController::class, ['names' => 'refund']);
    Route::post('Refunt policyyy/{id}', [Admin\RefundController::class, 'update'])->name('refund_update');
    Route::resource('Terms of Use', Admin\TermsController::class, ['names' => 'terms']);
    Route::post('Terms of use/{id}', [Admin\TermsController::class, 'update'])->name('terms_update');

    // Product managment
    Route::resource('Categories', Admin\GameController::class, ['names' => 'cats']);
    Route::resource('category', Admin\CategoryController::class, ['names' => 'category']);
    Route::resource('Accounts', Admin\AccountController::class, ['names' => 'accounts']);
    Route::post('Account/{id}', [Admin\AccountController::class, 'update'])->name('accounts_update');
    Route::resource('Ingredient', Admin\IngredientsController::class, ['names' => 'ingredient']);
    Route::resource('Review', Admin\ReviewController::class, ['names' => 'reviews']);
    Route::get('/approve/{id}', [Admin\ListController::class, 'approve'])->name('review.approve');
    Route::resource('Faq', Admin\FaqController::class, ['names' => 'faq']);

    // Order managment
    Route::get('/neworder-list', [Admin\ListController::class, 'neworder'])->name('neworder.list');
    Route::get('/shippedorder-list', [Admin\ListController::class, 'shippedorder'])->name('shippedorder.list');
    Route::get('/order-list', [Admin\ListController::class, 'order'])->name('order.list');
    Route::get('/order-status/{id}/{type}', [Admin\ListController::class, 'status'])->name('order.status');

    // Users
    Route::get('/user', [Admin\ListController::class, 'user'])->name('user.list');
    Route::get('/Userban/{id}', [Admin\ListController::class, 'userban'])->name('userban');
    Route::get('/Userunban/{id}', [Admin\ListController::class, 'userunban'])->name('userunban');

    // Ajax functions
    Route::get('/get-subcat/{id}', [AjaxController::class, 'subcat'])->name('getsubCat');
    Route::get('/get-subsubcat/{id}', [AjaxController::class, 'getproduct'])->name('getsubsubCat');
    Route::get('/get-product/{id}', [AjaxController::class, 'getproduct'])->name('getproducts');

    //unknown
    // Route::resource('credentials', Admin\CredentialController::class, ['names' => 'credentials']);
    // Route::post('Credentials/{id}', [Admin\CredentialController::class, 'store'])->name('credentials_store');
    // Route::resource('sub-cat', Admin\SubcatController::class, ['names' => 'subcat']);
    // Route::resource('sub-category', Admin\SubCategoryController::class, ['names' => 'subcategory']);
    // Route::resource('Brand', Admin\BrandController::class, ['names' => 'brand']);
    // Route::resource('size', Admin\SizeController::class, ['names' => 'size']);
    // Route::resource('color', Admin\ColorController::class, ['names' => 'color']);
    // Route::resource('product', Admin\ProductController::class, ['names' => 'product']);
    // Route::resource('coupon-code', Admin\CouponCodeController::class, ['names' => 'coupon']);
});
