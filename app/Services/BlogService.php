<?php

namespace App\Services;

use App\Models\Blog; // Model Blog is imported
use App\Traits\LikeTrait; // Like train imported


class BlogService
{
    use LikeTrait;


    /**
     * Getting all blogs 
     */
    public function getAll()
    {
        return Blog::with('user:id,first_name,last_name')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    /**
     * store blog
     */
    public function store($request)
    {
        $data = $request->validated();
        // $data["user_id"] = $request->user_id ?? auth()->id();
        $data["user_id"] = 1;

        // dd($data);
        return Blog::create($data);

    }

    /**
     * Getting a single blog
     */
    public function show($blog)
    {
        // $blog->loadCount(['likes','comments.likes']);
        // $blog->loadCount(['likes', 'comments'])
        //     ->load([
        //         'comments' => function ($query) {
        //             $query->withCount('likes');
        //         }
        //     ]); // eager loading to count likes

        return $blog;
    }

    /**
     * like blog 
     */
    public function like($blog)
    {
        // $this->blogService->like($blog);
        return $this->likable($blog);
    }


    /**
     * Update blog
     */
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





}