<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('admin');
        }
        if (!isset(auth()->user) && auth()->user()->role_id != 1) {
            return redirect('admin')->with('error', 'Invalid username or password');
        }
        return $next($request);
    }
}
