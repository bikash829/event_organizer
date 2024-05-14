<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\BlogStoreRequest;
use App\Services\BlogService;

// use App\Models\Blog;

class BlogController extends Controller
{

    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request)
    {
        //
        // $request['user_id'] = 1;
        // if ($request->validated()) {
        //     dd($request);
        // }

        if ($this->blogService->store($request)) {
            $request->session()->flash('success', 'Blog Created Successfully');
            return to_route('blog.index');

        } else {
            abort(403, 'Technical Error Occured.');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
        return "you are here to show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        return "you are here to edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
        return "you are here to update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        return "you are here to destroy";
    }
}
