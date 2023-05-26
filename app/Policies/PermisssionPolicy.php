<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Permission;
use App\Models\User;

class PermisssionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('browse-permissions');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permission $permisssion): bool
    {
        return $user->hasPermission('read_permissions');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('add_permissions');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permission $permisssion): bool
    {
        return $user->hasPermission('edit_permissions');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permission $permisssion): bool
    {
        return $user->hasPermission('delete_permissions');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permission $permisssion): bool
    {
        return $user->hasPermission('restore_permissions');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permission $permisssion): bool
    {
        return $user->hasPermission('forceDelete_permissions');
    }
}
