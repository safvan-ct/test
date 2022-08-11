<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public $active = 'website';
    public $active_sub = 'faq';

    public function index()
    {
        $products = Product::all();
        return view('admin.faq.index')
            ->with('products', $products)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = Faq::with('product')->Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('product', function ($result) {
                if($result->product_id == 0) {
                    return "Common";
                }
                return $result->product->name;
            })
            ->addColumn('action', function ($result) {
                $delete_url = route('faq.status', [$result->id, 2]);
                $url = route('faq.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info'>{$text}</button>
                    <span style='display: none' id='product_id_{$result->id}'>{$result->product_id}</span>
                    <span style='display: none' id='question_{$result->id}'>{$result->question}</span>
                    <span style='display: none' id='answer_{$result->id}'>{$result->answer}</span>";

                return $res;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $faq = $request->id == 0 ? new Faq : Faq::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        $request->validate([
            'product_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $data = [
            'product_id' => $request->product_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ];

        $faq->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = Faq::findOrFail($id);
        if (in_array($status, [0, 1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message . ' Sucessfully']);
    }
}
