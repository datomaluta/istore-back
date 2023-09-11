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
	 * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		// Check if the user is authenticated and is an admin
		if (auth()->check() && auth()->user()->isAdmin) {
			return $next($request); // User is an admin, allow access
		}

		// Return an error response with a 403 Forbidden status code
		return response()->json(['message' => auth()->user()], 403);
	}
}
