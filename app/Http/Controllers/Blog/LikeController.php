<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;
// Models
use App\Models\Blog;

// Controller

// Services
use App\Services\BlogService;
use App\Services\BlogCommentService;



class LikeController extends Controller
{
    protected $blogService, $blogCommentService;


    public function __construct(
        BlogService $blogService,
        BlogCommentService $blogCommentService
    ) {
        $this->blogService = $blogService;
        $this->blogCommentService = $blogCommentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(LikeRequest $request)
    {
        // dd($request);
        if (isset($request->blog_id)) {
            $this->blogService->like($request->blog_id);
        } elseif (isset($request->comment_id)) {
            // dd($request->comment_id);
            $this->blogCommentService->like($request->comment_id);
        } else {
            abort(403, 'Technical Error Occured.');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
