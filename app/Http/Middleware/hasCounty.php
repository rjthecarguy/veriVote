<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class hasCounty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $counties = Auth::user()->roles;


         // Check if user has county assigned
         if (empty($counties) || count($counties) === 0) {
          
            abort(403, 'No County Assigned!.  Please contact your manager.');
        }

        return $next($request);
    }
}
