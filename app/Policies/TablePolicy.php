<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Table;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TablePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->is_manager) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissions(Permission::R.'tables');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Table $table)
    {
        return $user->hasPermissions(Permission::R.'tables');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissions(Permission::C.'tables');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Table $table)
    {
        return $user->haspermissions(permission::U.'tables');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Table $table)
    {
        return $user->haspermissions(permission::D.'tables');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Table $table)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Table $table)
    {
        //
    }
}
