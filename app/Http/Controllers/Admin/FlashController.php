<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Flash;
use Illuminate\Http\Request;

class FlashController extends Controller
{
    public $active = 'website';
    public $active_sub = 'falsh_news';

    public function index()
    {
        $flash = Flash::Orderby('id', 'desc')->get();
        return view('admin.web.flash')
            ->with('flashes', $flash)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $flash = Flash::find($id);
        $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'link' => $request->link,
        ];

        $flash->update($data);
        return Back()->with('success', 'Updated Sucessfully');
    }
}
