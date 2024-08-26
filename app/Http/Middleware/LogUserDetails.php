<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserLog;
use Torann\GeoIP\Facades\GeoIP;

class LogUserDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userLog = new UserLog();
        $userLog->ip_address = $request->ip();
        $geoData = geoip()->getLocation($request->ip());
        $userLog->country = $geoData['country'] ?? null;
        $userLog->user_agent = $request->header('User-Agent');
        $userLog->save();

        return $next($request);
    }
}
