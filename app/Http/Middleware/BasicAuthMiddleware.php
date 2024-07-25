<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->headers->has('Authorization') === false) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $username = config('basic-auth.username');
        $password = config('basic-auth.password');

        $credentials = "{$username}:{$password}";

        if ($request->headers->get('Authorization') !== 'Basic ' . base64_encode($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
