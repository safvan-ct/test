<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\HomePageContent;
use App\Models\PopupBanner;
use App\Models\Product;
use App\Models\Settings;
use App\Models\SocialMeadia;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

if (!function_exists('popupBanner')) {
    function popupBanner()
    {
        $popup = PopupBanner::latest()->first();
        return $popup;
    }
}

if (!function_exists('settings')) {
    function settings($key)
    {
        $settings = Settings::where('key', $key)->first();
        return !is_null($settings) ? $settings->value : null;
    }
}

if (!function_exists('homePageContent')) {
    function homePageContent($key)
    {
        $data = HomePageContent::where('key', $key)->first();
        return !is_null($data) ? $data->value : null;
    }
}

if (!function_exists('socialMeadia')) {
    function socialMeadia()
    {
        $datas = SocialMeadia::Orderby('id', 'desc')->get();
        return $datas;
    }
}

if (!function_exists('categories')) {
    function categories()
    {
        $datas = Category::orderby('id','desc')->get();
        return $datas;
    }
}

if (!function_exists('subCategories')) {
    function subCategories($category_id = null)
    {
        $datas = SubCategory::orderby('id', 'desc')->get();
        if(!is_null($category_id)) {
            $datas = SubCategory::where('category_id', $category_id)->get();
        }

        return $datas;
    }
}

if (!function_exists('getProduct')) {
    function getProduct($product_id)
    {
        $datas = Product::where('id', $product_id)->first()->toArray();
        return $datas;
    }
}

if (!function_exists('cartCount')) {
    function cartCount()
    {
        $cart = 0;
        if (auth()->check() && auth()->user()->role_id == 2) {
            $cart = Cart::where('user_id', auth()->user()->id)->count();
        } else if (session('cart')) {
            $cart = count((array) session('cart'));
        }

        return $cart;
    }
}
