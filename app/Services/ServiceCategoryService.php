<?php

namespace App\Services;

// ServiceCategoryRequest // use App\Http\Requests\ServiceCategoryRequest;
use App\Models\ServiceCategory;

class ServiceCategoryService
{
    public function getAllServiceCategory()
    {
        return ServiceCategory::all();
    }

    public function editCategory($id)
    {
        return ServiceCategory::find($id);
    }

    public function updateCategory($request, $category)
    {
        // $category = ServiceCategory::find($category);
        // $category->category_name = $request->category_name;
        // $category->description = $request->description;
        // $category->save();

        $data = $request->validated();
        // $data["user_id"] = 1;
        $category->update($data);
        return $category;
    }

    // Add more methods as needed...
}