<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
// use Illuminate\Http\Request;
use App\Services\BlogService; // Blog Service
use App\Http\Requests\StoreBlogRequest; // Blog Store Request
use App\Http\Requests\UpdateBlogRequest; // Blog Update Request
use Illuminate\Support\Facades\Session; // session flashback message

class UserBlogController extends Controller
{
    protected $blogService;

    /**
     * Constructor for service
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogService->getUserBlogs();
        return view('blogs.user_index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        if ($this->blogService->store($request)) {
            $request->session()->flash('success', 'Blog Created Successfully!');
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (auth()->id() != $blog->user_id) {
            abort(403, 'Unauthorized Access request');
        }
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($this->blogService->update($request, $blog)) {
            $request->session()->flash('success', 'Blog Updated Successfully');
        } else {
            $request->session()->flash('success', 'Count not update blog. Please try again.');
        }

        return to_route('blog.show', $blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (auth()->id() != $blog->user_id) {
            abort(403, 'Unauthorized Access request');
        }
        $blog->delete();
        Session::flash('success', 'Blog Updated Successfully');
        return to_route('user.blog.index');
    }
}
