<?php

namespace App\Policies;

use App\Models\ { User, Article };
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Grant all abilities to administrator.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->id === 4) { // 'admin'
            return true;
        }
    }

    /**
     * Determine whether the user can delete the image.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Article $image
     * @return mixed
     */
    public function manage(User $user, Article $image)
    {
        return $user->id === $image->user_id || $image->user_id === 4;
    }
  
// fin ----------------------
}