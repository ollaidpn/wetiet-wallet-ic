<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Refueling;
use Illuminate\Auth\Access\HandlesAuthorization;

class RefuelingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the refueling can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list refuelings');
    }

    /**
     * Determine whether the refueling can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Refueling  $model
     * @return mixed
     */
    public function view(User $user, Refueling $model)
    {
        return $user->hasPermissionTo('view refuelings');
    }

    /**
     * Determine whether the refueling can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create refuelings');
    }

    /**
     * Determine whether the refueling can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Refueling  $model
     * @return mixed
     */
    public function update(User $user, Refueling $model)
    {
        return $user->hasPermissionTo('update refuelings');
    }

    /**
     * Determine whether the refueling can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Refueling  $model
     * @return mixed
     */
    public function delete(User $user, Refueling $model)
    {
        return $user->hasPermissionTo('delete refuelings');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Refueling  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete refuelings');
    }

    /**
     * Determine whether the refueling can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Refueling  $model
     * @return mixed
     */
    public function restore(User $user, Refueling $model)
    {
        return false;
    }

    /**
     * Determine whether the refueling can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Refueling  $model
     * @return mixed
     */
    public function forceDelete(User $user, Refueling $model)
    {
        return false;
    }
}
