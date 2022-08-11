<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public $active = '';
    public $active_sub = '';

    public function index()
    {
        $id = auth()->user()->id;
        $admin = User::find($id);
        return view('admin.profile')
            ->with('admin', $admin)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        $id = auth()->user()->id;
        $admin = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/' . $admin->image);

            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/admin/', $filename, 'public');
            $filename = 'uploads/admin/' . $filename;
        } else {
            $filename = $admin->image;
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $filename,
        ]);

        return redirect(route('profile.index'))->with('success', 'Profile updated successfully');
    }

    public function edit($id)
    {
        $id = auth()->user()->id;
        $admin = User::find($id);
        return view('admin.password-change')
            ->with('admin', $admin)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $id = auth()->user()->id;
        $admin = User::find($id);

        if (Hash::check($request->current_password, $admin->password)) {
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'min:8|required_with:password|same:password',
            ]);

            $admin->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect(route('profile.edit', $id))->with('success', 'Password changed successfully');
        } else {
            return redirect(route('profile.edit', $id))->with('error', 'Current password not matching');
        }
    }
}
