<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // manage users ---------------------------->
    // Manage User 
    public function pendingSeller(UserService $userService)
    {
        $users = $userService->getPendingSeller();
        return view('admin.manage_user.all_user', compact('users'));
    }
    // all seller 
    public function allSeller(UserService $userService)
    {
        $users = $userService->getAllSellers();
        return view('admin.manage_user.all_user', compact('users'));
    }
    // all user 
    public function allUser(UserService $userService)
    {
        $users = $userService->getAllUsers();
        return view('admin.manage_user.all_user', compact('users'));
    }

    // all blocked users
    public function blockedUsers(UserService $userService)
    {
        $users = $userService->getAllBlockedUsers();
        return view('admin.manage_user.all_user', compact('users'));
    }


    public function viewUser(UserService $userService, $user)
    {
        // dd($user);
        $user = $userService->getUser($user);
        return view('admin.manage_user.view_user', compact('user'));
    }

    // block user 
    public function blockUser(UserService $userService, $user)
    {
        $userService->blockUser($user);
        return back();
    }

    // unblock user
    public function unblockUser(UserService $userService, $user)
    {
        $userService->unblockUser($user);
        return back();
    }
    // delete user 
    public function deleteUser(UserService $userService, $user)
    {

        $userService->destroyUser($user);
        return back();
    }



    // Mange users <------------------------------|



}
