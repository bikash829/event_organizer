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

        $blogs = Blog::with([
            'user:id,first_name,last_name,email',
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc')
                    ->withCount('likes')
                    ->with('user:id,first_name,last_name,email');
            }
        ])
            ->withCount('likes', 'comments') // eager loading to count likes and comments those are modal functions
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return $blogs;
    }

    /**
     * store blog
     */
    public function store($request)
    {
        $data = $request->validated();
        // $data["user_id"] = $request->user_id ?? auth()->id();
        $data["user_id"] = 1;

        return Blog::create($data);

    }

    /**
     * Getting a single blog
     */
    public function show($blog)
    {
        $blog->loadCount(['likes', 'comments'])
            ->load([
                'user:id,first_name,last_name,email',
                'comments' => function ($query) {
                    $query->orderBy('created_at', 'desc')
                        ->withCount('likes')
                        ->with('user:id,first_name,last_name,email');
                },
            ]);

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