<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Illuminate\Support\Facades\Schema;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track admin pages, assets or testing
        if ($request->is('admin*') || $request->is('_debugbar*') || $request->is('up')) {
            return $next($request);
        }

        try {
            if (Schema::hasTable('visitors')) {
                Visitor::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'page_url' => $request->fullUrl(),
                    'visited_at' => now(),
                ]);
            }
        } catch (\Throwable $e) {
            // Fail silently to never break visitor experience
        }

        return $next($request);
    }
}
