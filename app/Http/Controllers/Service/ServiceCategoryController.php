<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Services\ServiceCategoryService;

class ServiceCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    // make a contructor to use the service
    protected $serviceCategory;
    public function __construct(ServiceCategoryService $serviceCategoryService)
    {
        $this->serviceCategory = $serviceCategoryService;
    }

    public function index()
    {
        //
        $serviceCategories = $this->serviceCategory->getAllServiceCategory();
        // dd($serviceCategories);

        return view('admin.manage_service.service_category.index', compact('serviceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_service.service_category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required|max:255',
            'description' => 'required',
            // 'status' => 'required',
        ]);

        // dd($request);

        $serviceCategory = $this->serviceCategory->storeCategory($request);

        return redirect()->route('admin.service-category.index')->with('success', 'Service Category Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        //
        return view('admin.manage_service.service_category.form', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $request->validate([
            'category_name' => 'required|max:255',
            'description' => 'required',
            // 'status' => 'required',
        ]);
        //$serviceCategory = $this->serviceCategory->updateCategory($request, $serviceCategory);
        // return to_route('blogs.index');
        $serviceCategory->update($request->all());
        return redirect()->route('admin.service-category.index')->with('success', 'Service Category Updated Successfully');
    }

    // disable category
    public function disableCategory(ServiceCategory $category)
    {
        $category->update(['status' => 'disabled']);
        return redirect()->route('admin.service-category.index')->with('success', 'Service Category Disabled Successfully');
    }

    // enable category
    public function enableCategory(ServiceCategory $category)
    {
        $category->update(['status' => 'enabled']);
        return redirect()->route('admin.service-category.index')->with('success', 'Service Category Enabled Successfully');
    }

    // update category

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $serviceCategory)
    {


        //$serviceCategory = ServiceCategory::destroy($serviceCategory->id);
        ServiceCategory::destroy($serviceCategory->id);


        return redirect()->route('admin.service-category.index')->with('success', 'Service Category Deleted Successfully');

    }
}
