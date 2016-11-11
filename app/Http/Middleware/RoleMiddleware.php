<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
	{
		if ($request->user()->role_id != $role) {
			return redirect()->to($request->user()->role_id);
		}
		return $next($request);
	}
}
