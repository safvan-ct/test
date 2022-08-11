<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public $active = 'product';
    public $active_sub = 'product';

    public function index()
    {
        return view('admin.product.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = Product::with('category')->with('subCategory')->Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                if (!is_null($result->image1)) {
                    $path = asset('/storage/' . $result->image1);
                    return "<img src='{$path}' style='width: 100px; height: 50px'>";
                }
                return '';
            })

            ->addColumn('action', function ($result) {
                $edit_url = route('product.create.update.view', [$result->id]);
                $delete_url = route('product.status', [$result->id, 2]);
                $url = route('product.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<a href='{$edit_url}' class='btn btn-primary btn-block'>Edit</a>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger btn-block''>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info btn-block''>{$text}</button>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdateView($id)
    {
        $product = $id == 0 ? new Product : Product::findOrFail($id);

        return view('admin.product.create-update')
            ->with('product', $product)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function createUpdate(Request $request)
    {
        $product = $request->id == 0 ? new Product : Product::find($request->id);
        $request->session()->flash('error', 'Something went wrong please check your data');

        if (is_null($request->id)) {
            $request->validate([
                "category_id" => "required",
                "sub_category_id" => "required",
                "name" => "required",
                "price" => "required",
                "offer" => "required",
                "offer_price" => "required",
                "description" => "required",
                "ingredient" => "required",
                "benefits" => "required",
                "how_to_use" => "required",
                "for_best_result" => "required",
                'image1' => 'required',
                'image2' => 'required',
                'image3' => 'required',
                'image4' => 'required',
            ]);
        } else {
            $request->validate([
                "category_id" => "required",
                "sub_category_id" => "required",
                "name" => "required",
                "price" => "required",
                "offer" => "required",
                "offer_price" => "required",
                "ingredient" => "required",
                "benefits" => "required",
                "how_to_use" => "required",
                "for_best_result" => "required",
            ]);
        }

        $filename1 = $product->image1;
        $filename2 = $product->image2;
        $filename3 = $product->image3;
        $filename4 = $product->image4;

        if ($request->hasFile('image1')) {
            Storage::delete('/public/' . $product->image1);
            $filename1 = 'product_1_' . time() . '.' . $request->file('image1')->extension();
            $request->image1->storeAs('uploads/product', $filename1, 'public');
            $filename1 = 'uploads/product/' . $filename1;
        }

        if ($request->hasFile('image2')) {
            Storage::delete('/public/' . $product->image2);
            $filename2 = 'product_2_' . time() . '.' . $request->file('image2')->extension();
            $request->image2->storeAs('uploads/product', $filename2, 'public');
            $filename2 = 'uploads/product/' . $filename2;
        }

        if ($request->hasFile('image3')) {
            Storage::delete('/public/' . $product->image2);
            $filename3 = 'product_3_' . time() . '.' . $request->file('image3')->extension();
            $request->image3->storeAs('uploads/product', $filename3, 'public');
            $filename3 = 'uploads/product/' . $filename3;
        }

        if ($request->hasFile('image4')) {
            Storage::delete('/public/' . $product->image4);
            $filename4 = 'product_4_' . time() . '.' . $request->file('image4')->extension();
            $request->image4->storeAs('uploads/product', $filename4, 'public');
            $filename4 = 'uploads/product/' . $filename4;
        }

        $offer = ($request->price - ($request->price * $request->offer / 100));

        $youtube_url = $request->youtube_link;
        if (strpos($youtube_url, '/embed/') !== true) {
            $url = $request->youtube_url;
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
            $youtube_id = "";

            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if ($youtube_id != "") {
                $youtube_url = 'https://www.youtube.com/embed/' . $youtube_id;
            }
        }

        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'price' => $request->price,
            'offer' => $request->offer,
            'offer_price' => $offer,
            'description' => $request->description,
            'ingredient' => $request->ingredient,
            'benefits' => $request->benefits,
            'how_to_use' => $request->how_to_use,
            'for_best_result' => $request->for_best_result,
            'image1' => $filename1,
            'image2' => $filename2,
            'image3' => $filename3,
            'image4' => $filename4,
            'youtube_link' => $youtube_url,
        ];

        $product->updateOrCreate(['id' => $request->id], $data);

        return back()->with('success', 'Added Successfully');
    }

    public function status($id, $status)
    {
        $obj = Product::findOrFail($id);
        if (in_array($status, [0, 1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            Storage::delete('/public/' . $obj->image1);
            Storage::delete('/public/' . $obj->image2);
            Storage::delete('/public/' . $obj->image3);
            Storage::delete('/public/' . $obj->image4);
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message . ' Sucessfully']);
    }
}
