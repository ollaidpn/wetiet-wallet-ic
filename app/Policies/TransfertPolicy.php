<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Transfert;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransfertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the transfert can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list transferts');
    }

    /**
     * Determine whether the transfert can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Transfert  $model
     * @return mixed
     */
    public function view(User $user, Transfert $model)
    {
        return $user->hasPermissionTo('view transferts');
    }

    /**
     * Determine whether the transfert can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create transferts');
    }

    /**
     * Determine whether the transfert can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Transfert  $model
     * @return mixed
     */
    public function update(User $user, Transfert $model)
    {
        return $user->hasPermissionTo('update transferts');
    }

    /**
     * Determine whether the transfert can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Transfert  $model
     * @return mixed
     */
    public function delete(User $user, Transfert $model)
    {
        return $user->hasPermissionTo('delete transferts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Transfert  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete transferts');
    }

    /**
     * Determine whether the transfert can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Transfert  $model
     * @return mixed
     */
    public function restore(User $user, Transfert $model)
    {
        return false;
    }

    /**
     * Determine whether the transfert can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Transfert  $model
     * @return mixed
     */
    public function forceDelete(User $user, Transfert $model)
    {
        return false;
    }
}
