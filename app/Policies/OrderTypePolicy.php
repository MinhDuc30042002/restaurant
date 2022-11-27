<?php

namespace App\Policies;

use App\Models\OrderType;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderTypePolicy
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
        return $user->hasPermissions(Permission::R.'order_types');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, OrderType $orderType)
    {
        return $user->hasPermissions(Permission::R.'order_types');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissions(Permission::C.'order_types');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, OrderType $orderType)
    {
        return $user->hasPermissions(Permission::U.'order_types');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, OrderType $orderType)
    {
        return $user->hasPermissions(Permission::D.'order_types');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, OrderType $orderType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, OrderType $orderType)
    {
        //
    }
}
