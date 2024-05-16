<?php

namespace App\Services;

use App\Models\Blog;



// use Illuminate\Http\Request;

class BlogService
{
    public function store($request)
    {
        $data = $request->validated();
        // $data["user_id"] = $request->user_id ?? auth()->id();
        $data["user_id"] = 1;

        // dd($data);
        return Blog::create($data);

    }
    public function update($request, $blog)
    {
        return $blog->update($request->validated());
    }

    // public function getAll()
    // {
    //     $user_id = request('id');
    //     // return Blog::whereDate('published_at', '>', now())->get();

    //     // $blogs = Blog::latest()->paginate(10);
    //     // dd($blogs);
    //     $blogs = Blog::whereNull('published_at')->orWhereDate('published_at', '>=', now());
    //     if ($user_id) {
    //         $blogs = $blogs->where('user_id', $user_id);
    //     }
    //     return $blogs->orderBy('published_at', 'desc')->paginate(10);
    //     // return $blogs;
    // }
    public function getAll()
    {
        return Blog::orderBy('created_at', 'desc')->paginate(10);
    }


    public function show($blog)
    {
        return Blog::findOrFail($blog);
    }

}