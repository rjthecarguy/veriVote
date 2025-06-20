<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class roleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        // Get user object
        $user = Auth::user();

        // Check if user role is "admin", abort if not
        if ($user->role != 'admin') {
        
            abort(403, 'You are not authorized for this role');
        }

        // If "admin", continue
        return $next($request);
    }
}
