<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public $active = 'website';
    public $active_sub = 'settings';
    public $keys = [
        'flash_title',
        'flash_link',
        'delivery_policy',
        'privacy_policy',
        'refund_policy',
        'terms_of_use',
    ];

    public function index()
    {
        foreach($this->keys as $key) {
            Settings::updateOrCreate(['key' => $key], ['key' => $key]);
        }

        return view('admin.settings.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function create(Request $request)
    {
        foreach($this->keys as $key) {
            Settings::updateOrCreate(['key' => $key], ['value' => $request[$key]]);
        }
        return redirect(route('settings.index'))->with('success', 'Settings Updated successfully');
    }
}
