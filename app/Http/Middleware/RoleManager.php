<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == $role) {
                return $next($request);
            } else {
                if ($user->role == 1) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return url()->previous();
                }
            }
        } else {
            return redirect()->route('user.login');
        }
    }
}
