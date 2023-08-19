<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class RoleAuthorization
{
    /**
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next, $role)
    {
        $user = \Auth::user();
        if (!in_array($role, User::ROLES) || $user->role !== $role) {
            throw new AuthorizationException();
        }

        return $next($request);
    }
}
