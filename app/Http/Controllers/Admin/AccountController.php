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

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Account::join('games', 'games.id', '=', 'accounts.cat_id')->Orderby('accounts.id', 'desc')->get('accounts.*','game.title');
        $games=Game::Orderby('id', 'desc')->get();
        $subcategories = Category::Orderby('id', 'desc')->get();

        return view('admin.product.account', compact('datas','games','subcategories'));

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


        $request->validate(
            [
                "category" => "required|numeric",

                "title" => "required",
                "game" => "required",
                "description" => "required",
                "ingredient" => "required",
                "price" => "required|numeric",
                "offer" => "required|numeric",
                'image1' => 'required',
                'image2' => 'required',
                'image3' => 'required',
                'image4' => 'required',
                'image.*' => 'image|mimes:jpg,jpeg,png',
                "benefits" => "required",
                "howtouse" => "required",
                "forbestresult" => "required",
            ]
           
        );

        if($request->hasFile('image1')){
            
             $filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
             //$filename1 = time().'.'.$request->file('image1')->extension();
             $request->image1->storeAs('uploads/product', $filename1, 'public');
            $filename1 = 'uploads/product/'.$filename1;
       
        }
       

         if($request->hasFile('image2')){
             
              $filename2 = 'product_2_'.time().'.'.$request->file('image2')->extension();
          //$filename2 = time().'.'.$request->file('image2')->extension();
                $request->image2->storeAs('uploads/product', $filename2, 'public');
               $filename2 = 'uploads/product/'.$filename2;
        }
        
           if($request->hasFile('image3')){
                $filename3 = 'product_3_'.time().'.'.$request->file('image3')->extension();
       // $filename3 = time().'.'.$request->file('image3')->extension();
       $request->image3->storeAs('uploads/product', $filename3, 'public');
      $filename3 = 'uploads/product/'.$filename3;
            
        }
        
         

           if($request->hasFile('image4')){
                $filename4 = 'product_4_'.time().'.'.$request->file('image4')->extension();
       //$filename4 = time().'.'.$request->file('image4')->extension();
       $request->image4->storeAs('uploads/product', $filename4, 'public');
       $filename4 = 'uploads/product/'.$filename4;
        }
        

       $offer = ( $request->price - ( $request->price * $request->offer / 100 ));
       Account::create([
            'cat_id' => $request->game,
            'subcat_id' => $request->category,
            'name' => $request->title,
            'description' => $request->description,
            'ingredient' => $request->ingredient,
            'rate' => $request->price,
            'offer' => $request->offer,
            'offer_rate' => $offer,
            'image' =>$filename1,
             'image2' =>$filename2,
             'image3' =>$filename3,
            'image4' =>$filename4,
            'benefits' => $request->benefits,
            'howtouse' =>  $request->howtouse,
            'forbestresult' => $request->forbestresult,
        ]);

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

        $account = Account::find($id);

        $request->validate([


             "title" => "required",
                "game" => "required",
                "category"=>"required|numeric",
                "price" => "required|numeric",
                "offer" => "required|numeric",


        ]);

        if($request->hasFile('image1')){

       Storage::delete('/public/'.$account->image);
       
        $filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
      // $filename1 = time().'.'.$request->file('image1')->extension();
       $request->image1->storeAs('uploads/product', $filename1, 'public');
       $filename1 = 'uploads/product/'.$filename1;

        } else {
            $filename1 = $account->image;
        }
        
        
        
        if($request->hasFile('image2')){

       Storage::delete('/public/'.$account->image2);
         $filename2 = 'product_2_'.time().'.'.$request->file('image2')->extension();
      // $filename2 = time().'.'.$request->file('image2')->extension();
       $request->image2->storeAs('uploads/product', $filename2, 'public');
       $filename2 = 'uploads/product/'.$filename2;

        } else {
            $filename2 = $account->image2;
        }
        
        
        
        if($request->hasFile('image3')){

       Storage::delete('/public/'.$account->image3);
        $filename3 = 'product_3_'.time().'.'.$request->file('image3')->extension();
       //$filename3 = time().'.'.$request->file('image3')->extension();
       $request->image3->storeAs('uploads/product', $filename3, 'public');
       $filename3 = 'uploads/product/'.$filename3;

        } else {
            $filename3 = $account->image3;
        }
        
        
        
        if($request->hasFile('image4')){

       Storage::delete('/public/'.$account->image4);
        $filename4 = 'product_4_'.time().'.'.$request->file('image4')->extension();
       //$filename4 = time().'.'.$request->file('image4')->extension();
       $request->image4->storeAs('uploads/product', $filename4, 'public');
       $filename4 = 'uploads/product/'.$filename4;

        } else {
            $filename4 = $account->image4;
        }
        
        
        

        $offer = ( $request->price - ( $request->price * $request->offer / 100 ));

        $account->update([

             'cat_id' => $request->game,
             'subcat_id'=>$request->category,
            'name' => $request->title,
            'description' => $request->description,
            'ingredient' => $request->ingredient,
            'rate' => $request->price,
            'offer' => $request->offer,
            'offer_rate' => $offer,
            'image' =>$filename1,
             'image2' =>$filename2,
             'image3' =>$filename3,
            'image4' =>$filename4,
            'benefits' => $request->benefits,
            'howtouse' =>  $request->howtouse,
            'forbestresult' => $request->forbestresult,


        ]);

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
