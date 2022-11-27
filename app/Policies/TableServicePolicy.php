<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\TableService;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TableServicePolicy
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
        return $user->hasPermissions(Permission::R.'table_services');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TableService  $tableService
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TableService $tableService)
    {
        return $user->hasPermissions(Permission::R.'table_services');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissions(Permission::C.'table_services');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TableService  $tableService
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TableService $tableService)
    {
        return $user->hasPermissions(Permission::U.'table_services');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TableService  $tableService
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TableService $tableService)
    {
        return $user->hasPermissions(Permission::D.'table_services');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TableService  $tableService
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TableService $tableService)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TableService  $tableService
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TableService $tableService)
    {
        //
    }
}
