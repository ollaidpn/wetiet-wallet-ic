<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tokenizer;
use Illuminate\Auth\Access\HandlesAuthorization;

class TokenizerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tokenizer can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list tokenizers');
    }

    /**
     * Determine whether the tokenizer can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tokenizer  $model
     * @return mixed
     */
    public function view(User $user, Tokenizer $model)
    {
        return $user->hasPermissionTo('view tokenizers');
    }

    /**
     * Determine whether the tokenizer can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create tokenizers');
    }

    /**
     * Determine whether the tokenizer can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tokenizer  $model
     * @return mixed
     */
    public function update(User $user, Tokenizer $model)
    {
        return $user->hasPermissionTo('update tokenizers');
    }

    /**
     * Determine whether the tokenizer can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tokenizer  $model
     * @return mixed
     */
    public function delete(User $user, Tokenizer $model)
    {
        return $user->hasPermissionTo('delete tokenizers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tokenizer  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete tokenizers');
    }

    /**
     * Determine whether the tokenizer can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tokenizer  $model
     * @return mixed
     */
    public function restore(User $user, Tokenizer $model)
    {
        return false;
    }

    /**
     * Determine whether the tokenizer can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tokenizer  $model
     * @return mixed
     */
    public function forceDelete(User $user, Tokenizer $model)
    {
        return false;
    }
}
