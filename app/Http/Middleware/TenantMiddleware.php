<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->has('X-Tenant-ID')) {
            return response()->json(['error' => 'Unauthorized! The request does not have a tenant ID.'], 401);
        }

        $tenantId = $request->header('X-Tenant-ID');
        if (!Tenant::where('id', $tenantId)->exists()) {
            return response()->json(['error' => 'Unauthorized! The request does not have a valid tenant ID.'], 401);
        }

        return $next($request);
    }
}
