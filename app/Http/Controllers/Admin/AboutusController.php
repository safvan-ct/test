<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public $active = 'website';
    public $active_sub = 'about_us';

    public function index()
    {
        $abouts = Aboutus::Orderby('id', 'desc')->get();

        return view('admin.web.aboutus')
            ->with('abouts', $abouts)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $aboutus = Aboutus::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,

            'Heading' => $request->heading,
            'Productsaled' => $request->productsaled,

            'NumberofProducts' => $request->numberofproducts,
            'Buyersactive' => $request->buyersactive,

            'Rating' => $request->rating,
            'awardheading' => $request->awardheading,

            'awarddescription' => $request->awarddescription,
        ];

        $aboutus->update($data);
        return Back()->with('success', 'Updated Sucessfully');
    }
}
