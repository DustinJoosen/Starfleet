<?php

namespace App\Policies;

use App\Models\Species;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpeciesPolicy
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
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Species $species)
    {
        return $user->officer->rank != null;
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
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Species $species)
    {
        return $user->officer->rank->order >= 4;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Species $species)
    {
        return $user->officer->rank->order >= 4;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Species $species)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Species $species)
    {
        //
    }
}
