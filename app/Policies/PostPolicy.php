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
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user->id;
    }
    public function create(User $user, Post $request)
    {
        return $request->user_id == Auth::user()->id;
    }
}
