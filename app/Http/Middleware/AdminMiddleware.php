<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request); // Cho phép tiếp tục
        }

        return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
