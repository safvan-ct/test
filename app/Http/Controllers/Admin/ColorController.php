<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $datas = Color::Orderby('title', 'asc')->get();
        return view('admin.product.color', compact('datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Color::create([
            'title' => $request->title,
        ]);

        return redirect(route('color.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);

        $request->validate([
            'title' => 'required',
        ]);

        $color->update([
            'title' => $request->title,
        ]);

        return redirect(route('color.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        return redirect(route('color.index'))->with('success', 'Deleted Successfully');
    }
}
