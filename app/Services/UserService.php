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

    // all Vendor========================================> 
    public function getAllVendors()
    {
        return User::role('vendor')->get();
    }

    // pending Vendor 
    public function getPendingVendor()
    {
        return User::role('vendor')->where('is_verified', 'pending')->get();
    }
    // rejected Vendor
    public function getRejectedVendor()
    {
        return User::role('vendor')->where('is_verified', 'rejected')->get();
    }
    // Vendor <========================================


    // create user 
    public function createUser($data)
    {
        return User::create($data);
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