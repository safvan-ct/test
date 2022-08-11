<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;

class AjaxController extends Controller
{
    public function getSubCategory($id)
    {
        $subcat = SubCategory::where('category_id', $id)->orderby('title', 'asc')->get();
        return response()->json(['subcat' => $subcat]);
    }
}
