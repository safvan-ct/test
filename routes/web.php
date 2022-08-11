<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/shop/{cat}', [HomeController::class, 'categoryProducts'])->name('shop');
Route::get('/shop-cat/{cat}', [HomeController::class, 'subCategoryProducts'])->name('shopcat');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy');
Route::get('/terms-of-use', [HomeController::class, 'termsOfUse'])->name('terms');
Route::get('/refund-policy', [HomeController::class, 'refundPolicy'])->name('refund');
Route::get('/delivery-policy', [HomeController::class, 'deliveryPolicy'])->name('delivery');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('news');
Route::get('blog-details/{id}', [HomeController::class, 'blogDetail'])->name('new_detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactPost'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/profile-edit', [HomeController::class, 'profileUpdate'])->name('profileedit');
Route::get('/product-details/{id}', [HomeController::class, 'productDetails'])->name('account_details');
Route::post('/review', [HomeController::class, 'reviewPost'])->name('review.post');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/support', [HomeController::class, 'support'])->name('support');
Route::get('/register', [HomeController::class, 'register'])->name('registerpage');
Route::post('Products', [HomeController::class, 'search'])->name('search');

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCartPost'])->name('addTo.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::get('/checkout', [RazorpayPaymentController::class, 'checkout'])->name('checkout');
Route::post('razorpay-payments', [RazorpayPaymentController::class, 'index'])->name('paymentindex');
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

Auth::routes(['verify' => true]);
Route::group(['middleware' => 'verified'], function () {
    Route::get('/my-account', [UserController::class, 'myAccount'])->name('myaccount');
    Route::post('/user-update', [UserController::class, 'update'])->name('user.update');
});

Route::get('/admin', [Admin\AdminController::class, 'index'])->name('admin.login');
Route::post('/admin', [Admin\AdminController::class, 'login'])->name('admin.login');
Route::get('/admin-logout', [Admin\AdminController::class, 'logout'])->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::resource('profile', Admin\ProfileController::class, ['names' => 'profile']);

    Route::get('home', [Admin\AdminHomeController::class, 'index'])->name('dashboard');

    // Website managment
    Route::get('/settings', [Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/create', [Admin\SettingsController::class, 'create'])->name('settings.create');

    Route::get('/about-us', [Admin\AboutusController::class, 'index'])->name('about.us.index');
    Route::post('/about-us/create', [Admin\AboutusController::class, 'create'])->name('about.us.create');

    Route::get('/home-page', [Admin\HomePageController::class, 'index'])->name('home.page.index');
    Route::post('/home-page/create', [Admin\HomePageController::class, 'create'])->name('home.page.create');

    Route::get('/slider', [Admin\SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/results', [Admin\SliderController::class, 'result'])->name('slider.result');
    Route::post('/slider/create-update', [Admin\SliderController::class, 'createUpdate'])->name('slider.create.update');

    Route::get('/popup-banner', [Admin\PopupBannerController::class, 'index'])->name('popup.banner.index');
    Route::get('/popup-banner/results', [Admin\PopupBannerController::class, 'result'])->name('popup.banner.result');
    Route::post('/popup-banner/create-update', [Admin\PopupBannerController::class, 'createUpdate'])->name('popup.banner.create.update');
    Route::get('/popup-banner/status/{id}/{status}', [Admin\PopupBannerController::class, 'status'])->name('popup.banner.status');

    Route::get('/blog', [Admin\BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/results', [Admin\BlogController::class, 'result'])->name('blog.result');
    Route::post('/blog/create-update', [Admin\BlogController::class, 'createUpdate'])->name('blog.create.update');
    Route::get('/blog/status/{id}/{status}', [Admin\BlogController::class, 'status'])->name('blog.status');

    Route::get('/testimonial', [Admin\TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/testimonial/results', [Admin\TestimonialController::class, 'result'])->name('testimonial.result');
    Route::post('/testimonial/create-update', [Admin\TestimonialController::class, 'createUpdate'])->name('testimonial.create.update');
    Route::get('/testimonial/status/{id}/{status}', [Admin\TestimonialController::class, 'status'])->name('testimonial.status');

    Route::get('/social-meadia', [Admin\SocialMediaController::class, 'index'])->name('social.meadia.index');
    Route::get('/social-meadia/results', [Admin\SocialMediaController::class, 'result'])->name('social.meadia.result');
    Route::post('/social-meadia/create-update', [Admin\SocialMediaController::class, 'createUpdate'])->name('social.meadia.create.update');
    Route::get('/social-meadia/status/{id}/{status}', [Admin\SocialMediaController::class, 'status'])->name('social.meadia.status');

    Route::get('/award', [Admin\AwardController::class, 'index'])->name('award.index');
    Route::get('/award/results', [Admin\AwardController::class, 'result'])->name('award.result');
    Route::post('/award/create-update', [Admin\AwardController::class, 'createUpdate'])->name('award.create.update');
    Route::get('/award/status/{id}/{status}', [Admin\AwardController::class, 'status'])->name('award.status');

    Route::get('/seo', [Admin\SeoController::class, 'index'])->name('seo.index');
    Route::get('/seo/results', [Admin\SeoController::class, 'result'])->name('seo.result');
    Route::post('/seo/create-update', [Admin\SeoController::class, 'createUpdate'])->name('seo.create.update');
    Route::get('/seo/status/{id}/{status}', [Admin\SeoController::class, 'status'])->name('seo.status');

    // Product managment
    Route::get('/category', [Admin\CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/results', [Admin\CategoryController::class, 'result'])->name('category.result');
    Route::post('/category/create-update', [Admin\CategoryController::class, 'createUpdate'])->name('category.create.update');
    Route::get('/category/status/{id}/{status}', [Admin\CategoryController::class, 'status'])->name('category.status');

    Route::get('/sub-category', [Admin\SubCategoryController::class, 'index'])->name('sub.category.index');
    Route::get('/sub-category/results', [Admin\SubCategoryController::class, 'result'])->name('sub.category.result');
    Route::post('/sub-category/create-update', [Admin\SubCategoryController::class, 'createUpdate'])->name('sub.category.create.update');
    Route::get('/sub-category/status/{id}/{status}', [Admin\SubCategoryController::class, 'status'])->name('sub.category.status');

    Route::get('/product', [Admin\ProductController::class, 'index'])->name('product.index');
    Route::get('/product/results', [Admin\ProductController::class, 'result'])->name('product.result');
    Route::get('/product/create-update/{id}', [Admin\ProductController::class, 'createUpdateView'])->name('product.create.update.view');
    Route::post('/product/create-update', [Admin\ProductController::class, 'createUpdate'])->name('product.create.update');
    Route::get('/product/status/{id}/{status}', [Admin\ProductController::class, 'status'])->name('product.status');

    Route::get('/product-ingredient', [Admin\ProductIngredientController::class, 'index'])->name('product.Ingredient.index');
    Route::get('/product-ingredient/results', [Admin\ProductIngredientController::class, 'result'])->name('product.Ingredient.result');
    Route::post('/product-ingredient/create-update', [Admin\ProductIngredientController::class, 'createUpdate'])->name('product.Ingredient.create.update');
    Route::get('/product-ingredient/status/{id}/{status}', [Admin\ProductIngredientController::class, 'status'])->name('product.Ingredient.status');

    Route::get('/faq', [Admin\FaqController::class, 'index'])->name('faq.index');
    Route::get('/faq/results', [Admin\FaqController::class, 'result'])->name('faq.result');
    Route::post('/faq/create-update', [Admin\FaqController::class, 'createUpdate'])->name('faq.create.update');
    Route::get('/faq/status/{id}/{status}', [Admin\FaqController::class, 'status'])->name('faq.status');

    Route::get('/review', [Admin\ReviewController::class, 'index'])->name('review.index');
    Route::get('/review/results', [Admin\ReviewController::class, 'result'])->name('review.result');
    Route::get('/review/status/{id}/{status}', [Admin\ReviewController::class, 'status'])->name('review.status');

    Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/results', [Admin\UserController::class, 'result'])->name('users.result');
    Route::get('/users/status/{id}/{status}', [Admin\UserController::class, 'status'])->name('users.status');

    Route::get('/orders/{type}', [Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/results/{type}', [Admin\OrderController::class, 'result'])->name('orders.result');
    Route::get('/orders/status/{id}/{status}', [Admin\OrderController::class, 'status'])->name('orders.status');

    // Ajax functions
    Route::get('/get-sub-category/{id}', [AjaxController::class, 'getSubCategory'])->name('getsubCat');
});
