<?php

namespace App\Http\Controllers;

use App\Models\Admin\Account;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function cart()
    {
        return view('cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Account::find($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            // $cart[$id]['quantity']++;
            $cart[$id]['quantity']=$cart[$id]['quantity'];
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->offer_rate,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('status', 'Product added to cart successfully!');
    }

    public function adddetailToCart( Request $request,$id)
    {
        $product = Account::find($id);
         $quantity=$request->quantity;
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']=$quantity;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" =>$quantity,
                "price" => $product->rate,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Product added to cart successfully!');
  
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {

        if($request->id) {

            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



  }
