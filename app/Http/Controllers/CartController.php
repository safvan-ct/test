<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cart_items = [];
        if (auth()->check() && auth()->user()->role_id == 2) {
            if (session('cart')) {
                foreach (session('cart') as $id => $data) {
                    $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->first();
                    $cart = is_null($cart) ? new Cart : $cart;
                    $data['user_id'] = auth()->user()->id;
                    unset($data['id']);
                    $cart->updateOrCreate(['id' => $cart->id], $data);
                }
            }

            $cart_items = Cart::where('user_id', auth()->user()->id)->get()->toArray();
        } else if (session('cart')) {
            $cart_items = session('cart');
        }

        return view('cart')->with('cart_items', $cart_items);
    }

    public function addToCartPost(Request $request, $id)
    {
        $quantity = $request->quantity;
        $product_id = $id;
        return self::addToCart($product_id, $quantity);
    }
    public function addToCart($id, $quantity = 1)
    {
        $product = Product::find($id);

        $data = [
            "id" => 0,
            "user_id" => 0,
            "product_id" => $product->id,
            "product_qty" => $quantity,
            "product_price" => $product->offer_price,
            "discount" => 0,
            "total" => $product->offer_price,
        ];

        if (auth()->check() && auth()->user()->role_id == 2) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
            $cart = is_null($cart) ? new Cart : $cart;
            $data['user_id'] = auth()->user()->id;
            $cart->updateOrCreate(['id' => $cart->id], $data);
        }

        if (!auth()->check()) {
            $cart = session()->get('cart', []);
            if (!isset($cart[$id])) {
                $cart[$id] = $data;
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('status', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            if (auth()->check() && auth()->user()->role_id == 2) {
                $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $request->id)->first();
                if(!is_null($cart)) {
                    $data = ['product_qty' => $request->quantity];
                    $cart->updateOrCreate(['id' => $cart->id], $data);
                }
            }
            else {
                $cart = session()->get('cart');
                $cart[$request->id]["product_qty"] = $request->quantity;
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            if (auth()->check() && auth()->user()->role_id == 2) {
                $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $request->id)->first();
                if(!is_null($cart)) {
                    $cart->delete();
                }
            }
            else {
                $cart = session()->get('cart');
                if (isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
            }

            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }
}
