<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $services = Service::with([
            'serviceCategory:id,category_name',
            'vendor:id,first_name,last_name,email',
        ])->get();

        return view('admin.manage_service.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $serviceCategories = ServiceCategory::where('status', 'enabled')->get();



        $vendors = User::role('vendor')
            ->get();
        // dd($serviceCategories->toArray());
        // dd($vendors->toArray());

        return view('admin.manage_service.service.create', compact('serviceCategories', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {

        // $serviceCategoryExists = ServiceCategory::find($request->service_category_id) !== null;
        // $vendorExists = User::find($request->vendor_id) !== null;

        // dd($serviceCategoryExists, $vendorExists);
        Service::create($request->validated());


        // $service->vendors()->sync($request->vendor_id);
        return to_route('admin.services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
        $service->load([
            'serviceCategory:id,category_name',
            'vendor:id,first_name,last_name,email',
        ]);
        return view('admin.manage_service.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
