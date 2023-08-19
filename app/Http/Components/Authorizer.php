<?php

namespace App\Http\Components;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;

class Authorizer
{
    /**
     * @throws AuthorizationException
     */
    public static function role(string $role)
    {
      $user = \Auth::user();
        if (in_array($role, User::ROLES) && $user->role === $role) {
            return true;
        }

        throw new AuthorizationException();
    }

    public static function permission(string $permission)
    {
        // TODO
        /*$user = \Auth::user();
        if (in_array($role, User::ROLES) && $user->role === $role) {
            return true;
        }

        throw new AuthorizationException();*/
    }

}
