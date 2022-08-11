<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $admin = User::where('role_id', 1)->first();

        if (is_null($admin)) {
            $data = [
                'role_id' => 1,
                'name' => config('app.name'),
                'phone' => 0000000000,
                'email' => 'admin@email.com',
                'password' => Hash::make(123456),
            ];
            User::updateOrCreate(['email' => $data['email']], $data);
        }
    }

    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($data)) {
            return redirect(route('dashboard'));
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('admin');
    }
}
