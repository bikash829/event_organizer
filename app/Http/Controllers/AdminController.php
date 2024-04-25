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
        $pendingSellers = $userService->getAllSellers();
        return view('admin.manage_user.pending_seller', compact('pendingSellers'));
    }
    // all seller 
    public function allSeller(UserService $userService)
    {
        $sellers = $userService->getAllSellers();
        return view('admin.manage_user.all_seller', compact('sellers'));
    }




    // Mange users <------------------------------|



}
