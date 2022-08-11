<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductIngredientController extends Controller
{
    public $active = 'website';
    public $active_sub = 'product_ingredient';

    public function index()
    {
        $products = Product::all();
        return view('admin.product-ingredient.index')
            ->with('products', $products)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = ProductIngredient::with('product')->Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                if(!is_null($result->image)) {
                    $path = asset('/storage/uploads/product_ingredient/' . $result->image);
                    return "<img src='{$path}' style='width: 100px; height: 50px'>";
                }
                return '';
            })

            ->addColumn('action', function ($result) {
                $path = !is_null($result->image) ? asset('/storage/uploads/product_ingredient/' . $result->image) : '';
                $delete_url = route('product.Ingredient.status', [$result->id, 2]);
                $url = route('product.Ingredient.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info'>{$text}</button>
                    <span style='display: none' id='product_id_{$result->id}'>{$result->product_id}</span>
                    <span style='display: none' id='title_{$result->id}'>{$result->title}</span>
                    <span style='display: none' id='image_{$result->id}'>{$path}</span>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $product_ingredient = $request->id == 0 ? new ProductIngredient : ProductIngredient::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0){
            $request->validate([
                'product_id' => 'required',
                'title' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,webp',
            ]);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/product_ingredient/' . $product_ingredient->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/product_ingredient', $filename, 'public');
        }
        else {
            $filename = $product_ingredient->image;
        }

        $data = [
            'product_id' => $request->product_id,
            'title' => $request->title,
            'image' => $filename,
        ];

        $product_ingredient->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = ProductIngredient::findOrFail($id);
        if (in_array($status, [0,1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            Storage::delete('/public/uploads/product_ingredient/' . $obj->image);
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message.' Sucessfully']);
    }
}
