<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role_id == 3) {

            return $next($request);
        }
        else {
            // then redirect his dashboard based on his actual role
            if (auth()->user()->role_id == 1) {
                return redirect('dashboard');
            }
            else if (auth()->user()->role_id == 2) {
                return redirect('superdashboard');
            }
        };
    }
}
