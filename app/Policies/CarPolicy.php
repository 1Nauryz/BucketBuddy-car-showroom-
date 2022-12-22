<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role->name == 'admin' or $user->role->name =='editor';
    }

    public function view(User $user, Car $car)
    {
    }

    public function create(User $user)
    {
        return $user->role->name =='user' or $user->role->name =='editor' or $user->role->name =='admin';
    }

    public function update(User $user, Car $car)
    {
        //
    }

    public function delete(User $user, Car $car)
    {
        return ($user->id == $car->user_id) || ($user->role->name != 'user');
    }

    public function restore(User $user, Car $car)
    {
        //
    }

    public function forceDelete(User $user, Car $car)
    {
        //
    }
}
