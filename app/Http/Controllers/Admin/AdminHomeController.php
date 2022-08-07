<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\CouponCode;
use App\Models\Admin\Product;
use App\Models\Admin\Size;
use App\Models\Admin\SubCategory;
use App\Models\Admin\Review;
use App\Models\User;
use App\Models\UserOrder;
use App\Models\Admin\Game;

class AdminHomeController extends Controller
{
    function index($home = null)
    {
        if($home == '') {
            
            $totals=UserOrder::where('status', "delivered")->get();
            $totalsales=0;
            foreach($totals as $total)
            {
                $t=$total->pay_amount;
                 $totalsales= $totalsales+$t;
            }
           
           
           
            $todaytotals=UserOrder::where('status', "delivered")->get();
            $todaytotalsales=0;
            foreach($todaytotals as $todaytotal)
            {
                if(date('d-m-y', strtotime($todaytotal->date)) == date('d-m-y'))
                {
                 $t=$todaytotal->pay_amount;
                 $todaytotalsales= $todaytotalsales+$t;
                }
               
            }
           
           
           
            
            $count = [

                'neworder' => UserOrder::where('status', "new")->count(),
                  'shippedorder' => UserOrder::where('status', "shipped")->count(),
                    'deliveredorder' => UserOrder::where('status', "delivered")->count(),
                    'totalsales'=>$totalsales,
                    'todaytotalsales'=>$todaytotalsales,
                     'user' => User::count(),
            ];
            return view('admin.home', compact('count'));
        }

        if($home == 'web') {
            $count = [

            ];
            return view('admin.home-web', compact('count'));
        }

        if($home == 'product') {
            $count = [
                'category' => Category::count(),
                'brand' => Brand::count(),
                'accounts'=>Account::count(),
                 'game'=>Game::count(),
                'reviews' => Review::count(),

            ];

            return view('admin.home-product', compact('count'));
        }

    }
}
