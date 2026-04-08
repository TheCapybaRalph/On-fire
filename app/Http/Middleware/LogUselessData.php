<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogUselessData
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::shareContext([
            'request_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Log::withContext([
            'from_within' => true
        ]);

        return $next($request);
    }
}
