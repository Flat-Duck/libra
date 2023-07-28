<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Paper;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaperPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the paper can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list papers');
    }

    /**
     * Determine whether the paper can view the model.
     */
    public function view(User $user, Paper $model): bool
    {
        return $user->hasPermissionTo('view papers');
    }

    /**
     * Determine whether the paper can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create papers');
    }

    /**
     * Determine whether the paper can update the model.
     */
    public function update(User $user, Paper $model): bool
    {
        return $user->hasPermissionTo('update papers');
    }

    /**
     * Determine whether the paper can delete the model.
     */
    public function delete(User $user, Paper $model): bool
    {
        return $user->hasPermissionTo('delete papers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete papers');
    }

    /**
     * Determine whether the paper can restore the model.
     */
    public function restore(User $user, Paper $model): bool
    {
        return false;
    }

    /**
     * Determine whether the paper can permanently delete the model.
     */
    public function forceDelete(User $user, Paper $model): bool
    {
        return false;
    }
}
