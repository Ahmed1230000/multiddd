<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        $admin = Auth::guard('admin-api')->check();
        // $user = Auth::guard('user-api')->check();
        if ($admin) {
            return $next($request);
        } else {
            return response()->json(['message' => 'You Are Not Admin !!']);
        }
    }
}
