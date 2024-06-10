<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Service;
use GuzzleHttp\Psr7\Request;

class ServiceItem extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with([
            'service:id,service_name,vendor_id',
            'service.vendor:id,first_name,last_name,email',
            'serviceCategory:id,category_name',
        ])->get();

        return view('admin.manage_service.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service_id = request()->service_id;
        $service = Service::where('id', $service_id)
            ->with([
                'serviceCategory:id,category_name',
                'vendor:id,first_name,last_name,email',
            ])->first();


        return view('admin.manage_service.item.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {

        $item = Item::create($request->validated());
        return redirect()->route('admin.item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
