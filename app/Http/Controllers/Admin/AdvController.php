<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Adv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvController extends Controller
{
    public $active = 'website';
    public $active_sub = 'offer_banner';

    public function index()
    {
        $advs = Adv::Orderby('id', 'desc')->get();
        return view('admin.web.adv')
            ->with('advs', $advs)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $filename = time() . '.' . $request->file('image')->extension();
        $request->image->storeAs('uploads/adv', $filename, 'public');

        $data = [
            'alt' => $request->alt,
            'link' => $request->link,
            'image' => $filename,
        ];
        Adv::create($data);

        return Back()->with('success', 'added');
    }

    public function update(Request $request, $id)
    {
        $adv = Adv::find($id);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/uploads/adv/' . $adv->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/adv', $filename, 'public');
        } else {
            $filename = $adv->image;
        }

        $data = [
            'alt' => $request->alt,
            'link' => $request->link,
            'image' => $filename,
        ];

        $adv->update($data);
        return Back()->with('success', 'Updated Sucessfully');
    }
}
