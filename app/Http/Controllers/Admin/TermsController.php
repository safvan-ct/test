<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public $active = 'website';
    public $active_sub = 'terms_of_use';

    public function __construct()
    {
        if (Terms::count() == 0) {
            Terms::create([
                'terms' => config('app.name'),
            ]);
        }
    }

    public function index()
    {
        $data = Terms::Orderby('id', 'desc')->first();
        return view('admin.web.terms')
            ->with('data', $data)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $terms = Terms::find($id);
        $request->validate([
            'terms' => 'required',
        ]);

        $terms->update([
            'terms' => $request->terms,
        ]);

        return redirect(route('terms.index'))->with('success', 'Updated Successfully');
    }
}
