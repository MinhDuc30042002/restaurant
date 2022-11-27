<?php

namespace App\Policies;

use App\Models\Partner;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
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
        return $user->hasPermissions(Permission::R.'partners');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Partner $partner)
    {
        return $user->hasPermissions(Permission::R.'partners');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissions(Permission::C.'partners');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Partner $partner)
    {
        return $user->hasPermissions(Permission::U.'partners');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Partner $partner)
    {
        return $user->hasPermissions(Permission::D.'partners');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Partner $partner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Partner $partner)
    {
        //
    }
}
