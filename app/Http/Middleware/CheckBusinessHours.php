<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBusinessHours
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current date and time.
        $now = now();

        // TEMPORARY TEST:
        // Simulate a weekday at 10:00 AM.
        $isWeekend = false;
        $hour = 10;

        // Business hours are from 9:00 AM to 5:00 PM,
        // Monday through Friday.
        if ($isWeekend || $hour < 9 || $hour >= 17) {
            abort(403, 'The Flash Sale is available Monday to Friday, 9:00 AM to 5:00 PM only.');
        }

        // If the request passes the checks,
        // allow it to continue to the route.
        return $next($request);
    }
}