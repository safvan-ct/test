<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Deliverypolicy;
use Illuminate\Http\Request;

class DeliverypolicyController extends Controller
{
    public $active = 'website';
    public $active_sub = 'delivary_policy';

    public function __construct()
    {
        if (Deliverypolicy::count() == 0) {
            Deliverypolicy::create([
                'delivery' => config('app.name'),
            ]);
        }
    }

    public function index()
    {
        $data = Deliverypolicy::Orderby('id', 'desc')->first();
        return view('admin.web.delivery')
            ->with('data', $data)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $delivery = Deliverypolicy::find($id);

        $request->validate([
            'delivery' => 'required',
        ]);

        $delivery->update([
            'delivery' => $request->delivery,
        ]);

        return redirect(route('deliverys.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $deliverys = Deliverypolicy::find($id);
        Deliverypolicy::destroy($deliverys->id);

        return redirect(route('delivery.index'))->with('success', 'Deleted Successfully');
    }
}
