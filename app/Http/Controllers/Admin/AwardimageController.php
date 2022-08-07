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

class AwardimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas =DB::table('awards')->Orderby('id', 'desc')->get();

        return view('admin.web.awardimage', compact('datas'));


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

 if($request->hasFile('image')){
            
             //$filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
             $filename1 = time().'.'.$request->file('image')->extension();
             $request->image->storeAs('uploads/award', $filename1, 'public');
            $filename1 = 'uploads/award/'.$filename1;
       
        }

                $data = [
                     'alt'=>$request->alt,
                    'image' => $filename1,
                
                ];
               DB::table('awards')->insert($data);

       

        return back()->with('success', 'Added Successfully');




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

        $datas  = Account::find($id);
        return view('admin.product.credential_add', compact('datas'));

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


        if($request->hasFile('image')){
            
             //$filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
             $filename1 = time().'.'.$request->file('image')->extension();
             $request->image->storeAs('uploads/award', $filename1, 'public');
            $filename1 = 'uploads/award/'.$filename1;
       
        }
  
     $leave = DB::table('awards')-> where('id', $id)->update(['image' =>$filename1, 'alt'=>$request->alt]);;
      
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
          DB::table('awards')-> where('id', $id)->delete();
             return back()->with('success', 'Deleted Successfully');
    }
}
