<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public $active = 'website';
    public $active_sub = 'about_us';
    public $keys = [
        'about_heading',
        'about_title',
        'about_description',
        'award_heading',
        'award_description',
    ];

    public function index()
    {
        foreach ($this->keys as $key) {
            Settings::updateOrCreate(['key' => $key], ['key' => $key]);
        }

        return view('admin.about-us.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function create(Request $request)
    {
        foreach ($this->keys as $key) {
            Settings::updateOrCreate(['key' => $key], ['value' => $request[$key]]);
        }
        return redirect(route('about.us.index'))->with('success', 'About us Updated successfully');
    }
}
