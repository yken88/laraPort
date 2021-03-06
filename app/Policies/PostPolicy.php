<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PostPolicy
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

    public function postControl(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }


    public function userControl(Admin $admin, Auth $user)
    {
        return $user = $admin;
    }
}
