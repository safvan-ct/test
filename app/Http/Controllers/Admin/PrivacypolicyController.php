<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Privacypolicy;
use Illuminate\Http\Request;

class PrivacypolicyController extends Controller
{

    public function __construct()
    {
        if(Privacypolicy::count() == 0 ) {
            Privacypolicy::create([
                'privacy' => config('app.name'),

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
        $privacies = Privacypolicy::Orderby('id', 'desc')->get();
        return view('admin.web.privacy', compact('privacies'));
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

        $privacy = Privacypolicy::find($id);

        $request->validate([
            'privacy' => 'required',

        ]);

        $privacy->update([
            'privacy' => $request->privacy,

        ]);

        return redirect(route('privacy.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privacies = Privacypolicy::find($id);

       Privacypolicy::destroy($privacies ->id);

        return redirect(route('privacy.index'))->with('success', 'Deleted Successfully');
    }
}
