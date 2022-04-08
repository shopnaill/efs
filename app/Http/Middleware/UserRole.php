<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // block access to Routes that are not allowed for the current user
        if (!auth()->user()->role || !auth()->user()->user_role->routePermission($request->route()->getName())) {
            return redirect()->route('home')->with('error', __('You are not authorized to access this page.'));
        } else {
            return $next($request);
        }
      

        return   response()->json(['message' => 'You are not authorized to access this page.'], 401);
    }
}
