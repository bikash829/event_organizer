<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogComment; // BlogComment Model
use App\Http\Requests\StoreBlogCommentRequest; // custom comment store request
use App\Http\Requests\UpdateBlogCommentRequest; // custom comment update request
use App\Services\BlogCommentService; // Service class
use App\Models\Blog; // Blog Model



class BlogCommentController extends Controller
{
    protected $blogCommentService;
    /**
     * Service constructor
     */
    public function __construct(BlogCommentService $blogCommentService)
    {
        $this->blogCommentService = $blogCommentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "comment index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "comment create";

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogCommentRequest $request, Blog $blog)
    {
        $comments = $this->blogCommentService->store($request, $blog);
        return to_route('blog.show', compact('blog', 'comments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogComment $blogComment)
    {
        return "comment show";

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComment $blogComment)
    {
        return "comment edit";
    }

    /**
     * Comment like 
     */
    // public function like(BlogComment $blogComment)
    // {
    //     $this->blogCommentService->like($blogComment);
    //     return back();
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogCommentRequest $request, BlogComment $blogComment)
    {
        return "comment update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComment $blogComment)
    {
        return "comment destroy";
    }


}
