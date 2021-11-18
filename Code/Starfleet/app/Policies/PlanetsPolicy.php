<?php

namespace App\Policies;

use App\Models\Planet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PlanetsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->officer->rank != null;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Planet $planet)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->officer->rank->order >= 4;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Planet $planet)
    {
        return $user->officer->rank->order >= 4;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Planet $planet)
    {
        return $user->officer->rank->order >= 4;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Planet $planet)
    {
        return $user->officer->rank->order >= 4;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planet  $planet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Planet $planet)
    {
        return $user->officer->rank->order >= 4;
    }
}
