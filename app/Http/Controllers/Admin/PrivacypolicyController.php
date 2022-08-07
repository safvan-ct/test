<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Privacypolicy;
use Illuminate\Http\Request;

class PrivacypolicyController extends Controller
{
    public $active = 'website';
    public $active_sub = 'privacy_policy';

    public function __construct()
    {
        if (Privacypolicy::count() == 0) {
            Privacypolicy::create([
                'privacy' => config('app.name'),
            ]);
        }
    }

    public function index()
    {
        $data = Privacypolicy::Orderby('id', 'desc')->first();
        return view('admin.web.privacy')
            ->with('data', $data)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $privacy = Privacypolicy::find($id);

        $request->validate([
            'privacy' => 'required',
        ]);

        $privacy->update([
            'privacy' => $request->privacy,
        ]);

        return redirect(route('privacy.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $privacies = Privacypolicy::find($id);
        Privacypolicy::destroy($privacies->id);

        return redirect(route('privacy.index'))->with('success', 'Deleted Successfully');
    }
}
