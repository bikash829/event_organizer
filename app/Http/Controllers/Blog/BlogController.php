<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog; // Blog Model
use App\Http\Requests\StoreBlogRequest; // Blog Store Request
use App\Http\Requests\UpdateBlogRequest; // Blog Update Request
use App\Http\Requests\LikeRequest; // Blog Like Request
use App\Services\BlogService; // Blog Service

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Session; // session flashback message

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
        // return view('blogs.create');
        return "Not working yet.";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // if ($this->blogService->store($request)) {
        //     $request->session()->flash('success', 'Blog Created Successfully!');
        //     return to_route('blog.index');

        // } else {
        //     abort(403, 'Technical Error Occured.');
        // }
        return "Not working yet.";
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog = $this->blogService->show($blog);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Like the specified resource.
     */
    public function like(LikeRequest $request)
    {
        // dd($request->blog_id);
        dd($request->type);
        $this->blogService->like($request->blog_id);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // return view('blogs.edit', compact('blog'));
        return "Not working yet.";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        // if ($this->blogService->update($request, $blog)) {
        //     $request->session()->flash('success', 'Blog Updated Successfully');
        // } else {
        //     $request->session()->flash('success', 'Count not update blog. Please try again.');
        // }

        // return to_route('blog.show', $blog);
        return "Not working yet.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // $blog->delete();
        // Session::flash('success', 'Blog Updated Successfully');
        // return to_route('blog.index');
        return "Not working yet.";
    }


}
