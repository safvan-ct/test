<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\Size;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::Orderby('title', 'asc')->get();
        $subCategories = SubCategory::Orderby('title', 'asc')->get();
        $sizes = Size::Orderby('id', 'asc')->get();
        $colors = Color::Orderby('title', 'asc')->get();
        $datas = Product::with('category', 'subCategory')->where('status', 'none')->Orderby('id', 'desc')->get();
        
        return view('admin.product.product', compact('categories', 'subCategories', 'sizes', 'colors', 'datas'));
    }

    public function create()
    {
        $categories = Category::Orderby('title', 'asc')->get();
        $subCategories = SubCategory::Orderby('title', 'asc')->get();
        $sizes = Size::Orderby('id', 'asc')->get();
        $colors = Color::Orderby('title', 'asc')->get();
        $datas = Product::with('category', 'subCategory')->where('status', 'featured')->Orderby('id', 'desc')->get();

        return view('admin.product.featured', compact('categories', 'subCategories', 'sizes', 'colors', 'datas'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        if($product->status == 'none') {
            $product->update(['status' => 'featured']);
            $msg = "Product add to featured list Successfully";   
        } else {
            $product->update(['status' => 'none']);
            $msg = "Product reomved from featured list Successfully";  
        }

        return back()->with('success', $msg);
    }

    public function store(Request $request)
    {
        $request->session()->flash('error', 'Something went wrong please check your data');

        $request->validate(
            [
                "category" => "required|numeric",
               
                "title" => "required",
                "description" => "required",
                "stock" => "required|numeric",
                "price" => "required|numeric",
                "offer" => "required|numeric",
                "size" => "required",
                "color" => "required",

                'image' => 'required',
                'image.*' => 'image|mimes:jpg,jpeg,png',
            ],
            [
                'image.*.mimes' => 'Only jpeg,png images are allowed',
            ]
        );

        if($request->hasFile('image')){
            foreach($request->file('image') as $key => $file){
                $filename = 'product_'.$key.'_'.time().'.'.$file->extension();
                $file->storeAs('uploads/product', $filename, 'public');
                $images[] = 'uploads/product/'.$filename;
            }
        }

        $offer = ( $request->price - ( $request->price * $request->offer / 100 ));

        Product::create([
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'title' => $request->title,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'offer' => $request->offer,
            'offer_price' => $offer,
            'size' => implode(',', $request->size),
            'color' => implode(',', $request->color),
            'status' => $request->status,
            'image' => implode(',', $images),
        ]);

        return back()->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->session()->flash('error', 'Something went wrong please check your data');
        
        $request->validate([
            "category" => "required|numeric",
           
            "title" => "required",
            "description" => "required",
            "stock" => "required|numeric",
            "price" => "required|numeric",
            "offer" => "required|numeric",
            "size" => "required",
            "color" => "required",
        ]);

        if($request->hasFile('image')){

            foreach($product->image as $image) {
                Storage::delete('/public/'.$image);
            }

            foreach($request->file('image') as $key => $file){
                $filename = 'product_'.$key.'_'.time().'.'.$file->extension();
                $file->storeAs('uploads/product', $filename, 'public');
                $images[] = 'uploads/product/'.$filename;
            }
        } else {
            $images = $product->image;
        }

        $offer = ( $request->price - ( $request->price * $request->offer / 100 ));

        $product->update([
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'title' => $request->title,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'offer' => $request->offer,
            'offer_price' => $offer,
            'size' => implode(',', $request->size),
            'color' => implode(',', $request->color),
            'image' => implode(',', $images),
        ]);

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        foreach($product->image as $image) {
            Storage::delete('/public/'.$image);
        }

        $product->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
