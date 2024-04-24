<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }


    public function getUser($user)
    {
        return User::find($user);
    }

    // create user 
    public function createUser($data)
    {
        return User::create($data);
    }

    // update user
    public function updateUser($data, $user)
    {
        return User::where('id', $user)->update($data);
    }

    // destroy user 
    public function destroyUser($user)
    {
        return User::destroy($user);
    }
}