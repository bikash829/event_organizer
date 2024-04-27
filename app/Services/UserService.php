<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    // all users
    public function getAllUsers()
    {
        return User::withoutRole('admin')->get();

    }

    // all seller 
    public function getAllSellers()
    {
        return User::role('seller')->get();
    }

    // all customer
    public function getAllCustomer()
    {
        return User::role('user')->get();
    }

    // a user
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