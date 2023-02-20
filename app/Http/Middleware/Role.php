<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $middlewareroles = explode('|', $roles);
        $middlewareroles = array_map(fn ($roles) => User::ROLES[$roles], $middlewareroles);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }
        if (in_array($user->role, $middlewareroles)) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
