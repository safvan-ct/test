<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public $active = 'product';
    public $active_sub = 'brand';

    public function index()
    {
        $datas = Brand::Orderby('id', 'desc')->get();
        return view('admin.product.brand')
            ->with('datas', $datas)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Brand::create([
            'title' => $request->title,
        ]);

        return redirect(route('brand.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $request->validate([
            'title' => 'required',
        ]);
        $brand->update([
            'title' => $request->title,
        ]);

        return redirect(route('brand.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        Brand::destroy($brand->id);
        return redirect(route('brand.index'))->with('success', 'Deleted Successfully');
    }
}
