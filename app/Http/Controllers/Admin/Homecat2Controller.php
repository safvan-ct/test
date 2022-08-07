<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Credential;
use App\Models\Admin\Game;
use App\Models\Admin\Subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Homecat2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas =DB::table('homecat2')->Orderby('id', 'desc')->get();

      $products = Account::Orderby('accounts.id', 'desc')->get();
        $games=Game::Orderby('id', 'desc')->get();
        $subcategories = Category::Orderby('id', 'desc')->get();

        return view('admin.web.homecat2', compact('datas','games','subcategories','products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

     $leave = DB::table('homecat2')-> where('id', $id)->update(['cat_id' =>$request->game,'subcat_id'=>$request->category,'Product_id'=>$request->product]);;
       
     

        return back()->with('success', 'Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);


        if($account->image !='')
        {
            Storage::delete('/public/'.$account->image);
        }

        account::destroy($account->id);
        return redirect(route('accounts.index'))->with('success', 'Deleted Successfully');
    }
}
