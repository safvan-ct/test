<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Admin\Category;
use App\Models\Admin\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientsController extends Controller
{
    public $active = 'product';
    public $active_sub = 'ingredient';

    public function index()
    {
        $products = Account::join('games', 'games.id', '=', 'accounts.cat_id')->Orderby('accounts.id', 'desc')->get('accounts.*', 'game.title');
        $games = Game::Orderby('id', 'desc')->get();
        $subcategories = Category::Orderby('id', 'desc')->get();

        $datas = DB::table('ingredients')->Orderby('id', 'desc')->get();
        return view('admin.product.ingredients')
            ->with('products', $products)
            ->with('subcategories', $subcategories)
            ->with('games', $games)
            ->with('datas', $datas)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename1 = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/ingredient', $filename1, 'public');
            $filename1 = 'uploads/ingredient/' . $filename1;
        }

        $data = [
            'alt' => $request->alt,
            'title' => $request->title,
            'product' => $request->product,
            'image' => $filename1,
        ];
        DB::table('ingredients')->insert($data);

        return back()->with('success', 'Added Successfully');

    }

    public function edit($id)
    {
        $datas = Account::find($id);
        return view('admin.product.credential_add', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            //$filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
            $filename1 = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/ingredient', $filename1, 'public');
            $filename1 = 'uploads/ingredient/' . $filename1;
        }

        if ($request->hasFile('image')) {
            $leave = DB::table('ingredients')->where('id', $id)->update(['image' => $filename1, 'product' => $request->product, 'title' => $request->title, 'alt' => $request->alt]);
        } else {
            $leave = DB::table('ingredients')->where('id', $id)->update(['product' => $request->product, 'title' => $request->title, 'alt' => $request->alt]);

        }

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        DB::table('ingredients')->where('id', $id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
