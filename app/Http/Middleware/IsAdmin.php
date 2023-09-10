<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // logic for not showing admin/home 
        $value = $request->session()->get('isAdmin');
        if($value!=1){
            return redirect('dashboard')->with('error','You have no admin access.');
        }
        return $next($request);
    }
}
