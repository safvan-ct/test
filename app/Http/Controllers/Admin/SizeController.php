<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $datas = Size::Orderby('id', 'asc')->get();
        return view('admin.product.size', compact('datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Size::create([
            'title' => $request->title,
        ]);

        return redirect(route('size.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $size = Size::findOrFail($id);

        $request->validate([
            'title' => 'required',
        ]);

        $size->update([
            'title' => $request->title,
        ]);

        return redirect(route('size.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();

        return redirect(route('size.index'))->with('success', 'Deleted Successfully');
    }
}
