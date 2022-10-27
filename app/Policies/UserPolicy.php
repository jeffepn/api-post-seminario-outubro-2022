<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function userHasPermissionCreateUsers(User $user): bool
    {
        if ($user->type === UserType::ADMIN) {
            return true;
        }
        return false;
    }
}
