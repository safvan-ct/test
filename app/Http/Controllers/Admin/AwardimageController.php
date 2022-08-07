<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AwardimageController extends Controller
{
    public $active = 'website';
    public $active_sub = 'award_images';

    public function index()
    {
        $datas = DB::table('awards')->Orderby('id', 'desc')->get();

        return view('admin.web.awardimage')
            ->with('datas', $datas)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);

    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //$filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
            $filename1 = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/award', $filename1, 'public');
            $filename1 = 'uploads/award/' . $filename1;
        }

        $data = [
            'alt' => $request->alt,
            'image' => $filename1,
        ];
        DB::table('awards')->insert($data);

        return back()->with('success', 'Added Successfully');
    }

    public function edit($id)
    {
        $datas = Account::find($id);
        return view('admin.product.credential_add')
            ->with('datas', $datas)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            //$filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
            $filename1 = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/award', $filename1, 'public');
            $filename1 = 'uploads/award/' . $filename1;
        }
        $leave = DB::table('awards')->where('id', $id)->update(['image' => $filename1, 'alt' => $request->alt]);

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        DB::table('awards')->where('id', $id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
