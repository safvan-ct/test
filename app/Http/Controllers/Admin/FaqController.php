<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public $active = 'product';
    public $active_sub = 'faq';

    public function index()
    {
        $datas = DB::table('faqs')->orderby('id', 'desc')->get();
        return view('admin.product.faq')
            ->with('datas', $datas)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        DB::table('faqs')->insert([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect(route('faq.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        DB::table('faqs')->where('id', $id)->update(['question' => $request->question, 'answer' => $request->answer]);

        return redirect(route('faq.index'))->with('success', 'Added Successfully');

    }

    public function destroy($id)
    {
        DB::table('faqs')->delete($id);
        return redirect(route('faq.index'))->with('success', 'Deleted Successfully');
    }
}
