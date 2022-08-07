<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public $active = 'website';
    public $active_sub = 'refund_policy';

    public function __construct()
    {
        if (Refund::count() == 0) {
            Refund::create([
                'refund' => config('app.name'),
            ]);
        }
    }

    public function index()
    {
        $data = Refund::Orderby('id', 'desc')->first();
        return view('admin.web.refund')
            ->with('data', $data)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $refund = Refund::find($id);

        $request->validate([
            'refund' => 'required',
        ]);

        $refund->update([
            'refund' => $request->refund,
        ]);

        return redirect(route('refund.index'))->with('success', 'Updated Successfully');
    }
}
