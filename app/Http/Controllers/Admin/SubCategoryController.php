<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::Orderby('title', 'asc')->get();
        $datas = SubCategory::with('category')->Orderby('id', 'desc')->get();
        return view('admin.product.sub-category', compact('categories', 'datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required'
        ]);
 
        SubCategory::create([
            'title' => $request->title,
            'category_id' => $request->category,
        ]);
        
        return redirect(route('subcategory.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);

        $request->validate([
            'title' => 'required',
            'category_id' => $request->category,
        ]);

        $subcategory->update([
            'title' => $request->title,
            'category_id' => $request->category,
        ]);

        return redirect(route('subcategory.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        SubCategory::destroy($subcategory->id);

        return redirect(route('subcategory.index'))->with('success', 'Deleted Successfully');
    }
}
