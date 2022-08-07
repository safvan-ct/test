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

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas =DB::table('socialmedias')->Orderby('id', 'desc')->get();

        return view('admin.web.socialmedia', compact('datas'));


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
             $request->image->storeAs('uploads/socialmedia', $filename1, 'public');
            $filename1 = 'uploads/socialmedia/'.$filename1;
       
        }

                $data = [
                     'link'=>$request->link,
                     'alt'=>$request->alt,
                     'image' => $filename1,
                
                ];
               DB::table('socialmedias')->insert($data);

       

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
             $request->image->storeAs('uploads/socialmedia', $filename1, 'public');
            $filename1 = 'uploads/socialmedia/'.$filename1;
       
        }
         if($request->hasFile('image')){
            
  
     $leave = DB::table('socialmedias')-> where('id', $id)->update(['image' =>$filename1, 'alt'=>$request->alt,'link'=>$request->link,]);;
         }
         else
         {
              $leave = DB::table('socialmedias')-> where('id', $id)->update(['alt'=>$request->alt,'link'=>$request->link,]);;
    
         }
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
          DB::table('socialmedias')-> where('id', $id)->delete();
             return back()->with('success', 'Deleted Successfully');
    }
}
