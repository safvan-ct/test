<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Admin\Category;
use App\Models\Admin\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Homecat1Controller extends Controller
{
    public $active = 'website';
    public $active_sub = 'home_category1';

    public function index()
    {
        $datas = DB::table('homecat1')->Orderby('id', 'desc')->get();

        $products = Account::Orderby('accounts.id', 'desc')->get();
        $games = Game::Orderby('id', 'desc')->get();
        $subcategories = Category::Orderby('id', 'desc')->get();

        return view('admin.web.homecat1')
            ->with('datas', $datas)
            ->with('games', $games)
            ->with('subcategories', $subcategories)
            ->with('products', $products)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $leave = DB::table('homecat1')->where('id', $id)->update(['cat_id' => $request->game, 'subcat_id' => $request->category, 'Product_id' => $request->product]);

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $account = Account::find($id);

        if ($account->image != '') {
            Storage::delete('/public/' . $account->image);
        }

        account::destroy($account->id);
        return redirect(route('accounts.index'))->with('success', 'Deleted Successfully');
    }
}
