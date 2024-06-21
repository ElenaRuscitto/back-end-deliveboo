<?php

namespace App\Policies;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;


class RestaurantPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Restaurant $restaurant)
    {
        // dump('User ID: ' . $user->id);
        // dump('Restaurant User ID: ' . $restaurant->user_id);
        if($user->id !== $restaurant->user_id){
            abort(404);
        }
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Restaurant $restaurant)
    {
        if($user->id !== $restaurant->user_id){
            abort(404);
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Restaurant $restaurant)
    {
        if($user->id !== $restaurant->user_id){
            abort(404);
        }
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Restaurant $restaurant): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Restaurant $restaurant): bool
    // {
    //     //
    // }
}
