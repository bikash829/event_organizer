<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog; // Blog Model
use App\Models\Like; // Like Model
use App\Http\Requests\StoreBlogRequest; // Blog Store Request
use App\Http\Requests\UpdateBlogRequest; // 
use App\Services\BlogService;
// use App\Traits\LikeTrait;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // session flashback message

class BlogController extends Controller
{

    // use LikeTrait;
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
        $blogs = $this->blogService->getAll();
        // dd($blogs->toArray());
        return view('blogs.index', compact('blogs'));
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
        // dd(Like::all());
        
        $blog = $this->blogService->show($blog);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        $blog = $this->blogService->update($request, $blog);
        $request->session()->flash('success', 'Blog Updated Successfully');
        return to_route('blog.show', $blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        Session::flash('success', 'Blog Updated Successfully');
        return to_route('blog.index');
    }


    public function like(Blog $blog)
    {
        $this->blogService->like($blog);
        return back();
    }
}
