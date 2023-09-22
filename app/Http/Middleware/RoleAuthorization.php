<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class RoleAuthorization
{
    /**
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next, int $role)
    {
        $user = Auth::user();
        if (!in_array($role, array_keys(User::ROLES)) || $user->role < $role) {
            throw new AuthorizationException();
        }

        return $next($request);
    }
}
