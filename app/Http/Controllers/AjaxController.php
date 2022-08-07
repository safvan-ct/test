<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;

use App\Models\Admin\Account;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use App\Models\Admin\Subcat;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function subcat($id)
    {
        $subcat = Category::where('game', $id)->orderby('title', 'asc')->get();
        return response()->json(['subcat' => $subcat]);
    }
    
    
     public function subsubcat($id)
    {
        $subsubcat = Subcat::where('catid', $id)->orderby('subtitle', 'asc')->get();
        return response()->json(['subsubcat' => $subsubcat]);
    }
    
      public function getproduct($id)
    {
        $productid = Account::where('subcat_id', $id)->orderby('name', 'asc')->get();
        return response()->json(['productid' => $productid]);
    }

    // public function productGet(Request $request)
    // {
    //     if($request->subcat != null){
    //         DB::enableQueryLog();
    //         $products = Product::where([['sub_category_id', '=', $request->subcat],['offer_price', '<', $request->price]])->get();
    //         //dd(DB::getQueryLog());
    //     }
    //     else {
    //         $products = Product::where([['category_id', '=', $request->cat],['offer_price', '<', $request->price]])->get();
    //     }

    //     $items = (String) view('partials.shop-item', compact('products'));
    //     return json_encode(compact("items"));
    // }

    // public function getPoduct($productName)
    // {
    //     $product_start = Product::where([
    //                         ['title', "LIKE", "\\" . $productName . "%"]
    //                     ])
    //                     ->orderby('title', 'asc')->get()->toArray();

    //     $product_include = Product::where([
    //                         ['title', "LIKE", "%" . $productName . "%"],
    //                         ['title', "NOT LIKE", "\\" . $productName . "%"],
    //                     ])
    //                     ->orderby('title', 'asc')->get()->toArray();
    //     $posts = array_merge($product_start, $product_include);

    //     return response()->json(['posts' => $posts]);
    // }
}
