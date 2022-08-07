<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Admin\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public $active = 'product';
    public $active_sub = 'reviews';

    public function index()
    {
        $products = Account::Orderby('id', 'desc')->get();
        $reviews = Review::Orderby('id', 'desc')->get();

        return view('admin.web.review')
            ->with('products', $products)
            ->with('reviews', $reviews)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function destroy($id)
    {
        $reviews = Review::find($id);
        review::destroy($reviews->id);

        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
