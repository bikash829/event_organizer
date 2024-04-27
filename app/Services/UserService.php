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

    // pending seller 
    public function getPendingSeller()
    {
        return User::role('seller')->where('is_verified', 'pending')->get();
    }
    // rejected seller
    public function getRejectedSeller()
    {
        return User::role('seller')->where('is_verified', 'rejected')->get();
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
    // block user 
    public function blockUser($user)
    {
        return User::where('id', $user)->update(['is_active' => 'blocked']);
    }

    // unblock user
    public function unblockUser($user)
    {
        return User::where('id', $user)->update(['is_active' => 'active']);
    }

    // all blocked user 
    public function getAllBlockedUsers()
    {
        return User::where('is_active', 'blocked')->get();
    }

    // destroy user 
    public function destroyUser($user)
    {
        return '';
    }
}