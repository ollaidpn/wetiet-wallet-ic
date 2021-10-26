<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Auth\Access\HandlesAuthorization;

class FavoritePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the favorite can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list favorites');
    }

    /**
     * Determine whether the favorite can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Favorite  $model
     * @return mixed
     */
    public function view(User $user, Favorite $model)
    {
        return $user->hasPermissionTo('view favorites');
    }

    /**
     * Determine whether the favorite can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create favorites');
    }

    /**
     * Determine whether the favorite can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Favorite  $model
     * @return mixed
     */
    public function update(User $user, Favorite $model)
    {
        return $user->hasPermissionTo('update favorites');
    }

    /**
     * Determine whether the favorite can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Favorite  $model
     * @return mixed
     */
    public function delete(User $user, Favorite $model)
    {
        return $user->hasPermissionTo('delete favorites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Favorite  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete favorites');
    }

    /**
     * Determine whether the favorite can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Favorite  $model
     * @return mixed
     */
    public function restore(User $user, Favorite $model)
    {
        return false;
    }

    /**
     * Determine whether the favorite can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Favorite  $model
     * @return mixed
     */
    public function forceDelete(User $user, Favorite $model)
    {
        return false;
    }
}
