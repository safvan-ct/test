<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seo;
use App\Models\SubCategory;
use Illuminate\View\Component;

class Meta extends Component
{
    public $metaData = [];

    public function __construct($routeName, $itemId)
    {
        $this->metaData = [
            'title' => config('app.name'),
            'og_title' => config('app.name'),
            'description' => '',
            'og_description' => '',
            'keywords' => '',
            'image' => '',
        ];

        if ($routeName == 'account_details') {

            $product = Product::where('id', $itemId)->first();

            $this->metaData['title'] = $this->metaData['og_title'] = $product['name'];
            $this->metaData['description'] = $this->metaData['og_description'] = $product['description'];
            $this->metaData['keywords'] = '';
            $this->metaData['image'] = $product['image'];
        }

        if ($routeName == 'shop') {
            $datas = Category::where('id', $itemId)->Orderby('id', 'desc')->first();
            //dd($datas,$itemId);
            $this->metaData = Seo::where('page', 'home')->first();
            $this->metaData['title'] = $this->metaData['og_title'] = $datas['title'];
        }

        if ($routeName == 'shopcatsubcat') {
            $datas = SubCategory::where('id', $itemId)->Orderby('id', 'desc')->first();

            $this->metaData = Seo::where('page', 'home')->first();
            $this->metaData['title'] = $this->metaData['og_title'] = $datas['subtitle'];
        }

        if ($routeName == 'shopcatsubcatall') {
            $datas = SubCategory::where('id', $itemId)->Orderby('id', 'desc')->first();
            $this->metaData = Seo::where('page', 'home')->first();
            $this->metaData['title'] = $this->metaData['og_title'] = $datas['title'];
        }

        if ($routeName == 'index') {
            $this->metaData = Seo::where('page', 'home')->first();
        }

        if ($routeName == 'about') {
            $this->metaData = Seo::where('page', 'about')->first();
        }

        if ($routeName == 'contact') {
            $this->metaData = Seo::where('page', 'contact')->first();
        }

        if ($routeName == 'login' || $routeName == 'register') {
            $this->metaData = Seo::where('page', 'login')->first();
        }
    }

    public function render()
    {
        return view('components.meta');
    }
}
