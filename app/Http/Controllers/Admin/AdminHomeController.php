<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class AdminHomeController extends Controller
{
    public $active = 'dashboard';
    public $active_sub = '';

    public function index()
    {
        $orders = Order::where('order_status', 3)->get();
        $totalsales = 0;
        $todaytotalsales = 0;

        foreach ($orders as $item) {
            $total = $item->paid_amount;
            $totalsales = $totalsales + $total;

            if (date('d-m-y', strtotime($item->date)) == date('d-m-y')) {
                $t = $item->pay_amount;
                $itemsales = $todaytotalsales + $t;
            }
        }

        $count = [
            'neworder' => Order::where('order_status', 1)->count(),
            'shippedorder' => Order::where('order_status', 2)->count(),
            'deliveredorder' => Order::where('order_status', 3)->count(),
            'totalsales' => $totalsales,
            'todaytotalsales' => $todaytotalsales,
            'users' => User::count(),
        ];
        return view('admin.home')
            ->with('count', $count)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);

    }
}
