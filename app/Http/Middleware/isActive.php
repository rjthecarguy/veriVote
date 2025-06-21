<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class isActive
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
          if ($user->active == 0) {
          
              abort(403, 'Your account is not active.  Please contact your manager.');
          }

        return $next($request);
    }
}
