<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public $active = 'orders';
    public $active_sub = 'orders';

    public function index($type)
    {
        return view('admin.orders.index')
            ->with('type', $type)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result($type)
    {
        $results = Order::where('order_status', $type)->Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('user', function ($result) {
                return $result->user_name;
            })
            ->addColumn('billin_address', function ($result) {
                $address = "{$result->user_address}, {$result->user_city}, {$result->user_state}, {$result->user_postal_code}, {$result->user_email}, {$result->user_phone}";
                return $address;
            })
            ->addColumn('products', function ($result) {
                return $result->product_name;
            })
            ->addColumn('purchased', function ($result) {
                return $result->paid_at;
            })
            ->addColumn('action', function ($result) use($type) {
                $delete_url = route('orders.status', [$result->id, 2]);

                $update_type = $type;
                if($result->order_status == 1) {
                    $update_type = 2;
                }
                if($result->order_status == 2) {
                    $update_type = 3;
                }

                $url = route('orders.status', [$result->id, $result->order_status]);
                $text = $update_type == 2 ? 'Ship' : 'Deliver';
                $msg = $update_type == 2 ? 'Are you want to ship the order?' : 'Are you want to deliver the order?';

                $res = "<button style='display: none' type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger'>Delete</button>
                    <button type='button' onclick='return confirmStatusModal($result->order_status, \"{$url}\", \"{$msg}\")' class='btn btn-info btn-block'>{$text}</button>";

                if($result->order_status == 3) {
                    $res = "<span>Delivered</span>";
                }

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function status($id, $status)
    {
        $obj = Order::findOrFail($id);
        if (in_array($status, [1])) {
            $obj->update(['order_status' => 2]);
            $message = 'Shipped';
        }
        elseif (in_array($status, [2])) {
            $obj->update(['order_status' => 3]);
            $message = 'Delivered';
        }

        return json_encode(['response' => 'success', 'message' => $message . ' Sucessfully']);
    }
}
