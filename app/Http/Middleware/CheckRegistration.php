<?php

namespace App\Http\Middleware;

use App\Models\Maintenance;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Maintenance::firstWhere('title', 'registration')->is_active) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
