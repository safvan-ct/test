<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $games = Game::Orderby('id', 'desc')->get();
        $datas = Category::Orderby('id', 'desc')->get();
        return view('admin.product.category', compact('datas','games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'game'=>'required',

        ]);

        Category::create([
            'title' => $request->title,
            'game' => $request->game,
            'description' => $request->description

        ]);

        return redirect(route('category.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $request->validate([
            'title' => 'required',
            'game'=>'required',
         ]);
        $category->update([
            'title' => $request->title,
            'game' => $request->game,
            'description' => $request->description

        ]);

        return redirect(route('category.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        Category::destroy($category->id);
        return redirect(route('category.index'))->with('success', 'Deleted Successfully');
    }
}
