<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function userCanEdit(User $user, Comment $comment)
    {
        if($user->type === UserType::ADMIN) {
            return true;
        }

        if($user->id === $comment->user_id) {
            return true;
        }
        
        return false;
    }
}
