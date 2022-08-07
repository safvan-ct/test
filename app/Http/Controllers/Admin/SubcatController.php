<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Game;
use App\Models\Admin\Subcat;
use Illuminate\Http\Request;

class SubcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::Orderby('id', 'desc')->get();
        $cats= Category::Orderby('id', 'desc')->get();
        $datas= Subcat::Orderby('id', 'desc')->get();
        return view('admin.product.subcategory', compact('datas','games','cats'));
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
        $request->validate([
            'title' => 'required',
            'cat'=>'required',
            'game'=>'required',

        ]);

        Subcat::create([
            'subtitle' => $request->title,
            'catid' => $request->cat,
            'game' => $request->game,

        ]);

        return redirect(route('subcat.index'))->with('success', 'Added Successfully');
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
        //
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
        $subcategory = Subcat::find($id);
        $request->validate([
            'title' => 'required',
            'cat'=>'required',
            'game'=>'required',
         ]);


        $subcategory->update([
            'subtitle' => $request->title,
            'catid' => $request->cat,
            'game' => $request->game,

        ]);

        return redirect(route('subcat.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcat = Subcat::find($id);
        subcat::destroy($subcat->id);
        return redirect(route('subcat.index'))->with('success', 'Deleted Successfully');
    }
}
