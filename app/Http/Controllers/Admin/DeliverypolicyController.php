<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Deliverypolicy;
use Illuminate\Http\Request;

class DeliverypolicyController extends Controller
{

    public function __construct()
    {
        if(Deliverypolicy::count() == 0 ) {
            Deliverypolicy::create([
                'delivery' => config('app.name'),

            ]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliverys = Deliverypolicy::Orderby('id', 'desc')->get();
        return view('admin.web.delivery', compact('deliverys'));
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
        //
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

        $delivery = Deliverypolicy::find($id);

        $request->validate([
            'delivery' => 'required',

        ]);

        $delivery->update([
            'delivery' => $request->delivery,

        ]);

        return redirect(route('deliverys.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deliverys = Deliverypolicy::find($id);

       Deliverypolicy::destroy($deliverys ->id);

        return redirect(route('delivery.index'))->with('success', 'Deleted Successfully');
    }
}
