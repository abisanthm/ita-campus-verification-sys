<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Symfony\Component\HttpFoundation\Response;

class CheckForRouteFile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Storage::disk('local')->exists('installed')) {
            return $next($request);
        }
         return redirect('/install');

    }

}
