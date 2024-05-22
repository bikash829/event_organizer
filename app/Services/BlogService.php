<?php

namespace App\Services;

use App\Http\Requests\LikeRequest;
use App\Models\Blog; // Model Blog is imported
use App\Traits\LikeTrait; // Like train imported
use Illuminate\Contracts\Database\Eloquent\Builder;

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
                    ->with([
                        'user:id,first_name,last_name,email',
                        'likes' => function ($query) {
                            $query->where('user_id', auth()->id());
                        },
                    ]);
            },
            'likes' => function ($query) {
                $query->where('user_id', auth()->id());
            },
        ])
            ->withCount('likes', 'comments') // eager loading to count likes and comments those are modal functions
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return $blogs;
    }
    /**
     * get user blogs 
     */
    public function getUserBlogs()
    {

        $blogs = Blog::with([
            'user:id,first_name,last_name,email',
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc')
                    ->withCount('likes')
                    ->with([
                        'user:id,first_name,last_name,email',
                        'likes' => function ($query) {
                            $query->where('user_id', auth()->id());
                        },
                    ]);

            },
            'likes' => function ($query) {
                $query->where('user_id', auth()->id());
            },
        ])
            ->withCount('likes', 'comments') // eager loading to count likes and comments those are modal functions
            ->orderBy('created_at', 'desc')
            ->where('user_id', auth()->id())
            ->paginate(10);
        // dd($blogs->toArray());
        return $blogs;
    }

    /**
     * store blog
     */
    public function store($request)
    {
        $data = $request->validated();
        // $data["user_id"] = $request->user_id ?? auth()->id();
        $data["user_id"] = auth()->id();

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
                'comments' => function (Builder $query) {
                    $query->orderBy('created_at', 'desc')
                        ->withCount('likes')
                        ->with([
                            'user:id,first_name,last_name,email',
                            'likes' => function (Builder $query) {
                                $query->where('user_id', auth()->id());
                            }
                        ]);
                },
            ]);

        // $blog->loadCount(['likes','comments.likes']);
        // $blog->loadCount(['likes', 'comments'])
        //     ->load([
        //         'comments' => function ($query) {
        //             $query->withCount('likes');
        //         }
        //     ]); // eager loading to count likes

        // dd($blog->toArray());
        return $blog;
    }

    /**
     * like blog 
     */
    public function like($blog_id)
    {
        $blog = Blog::findOrFail($blog_id);
        return $this->likable($blog);
    }


    /**
     * Update blog
     */
    public function update($request, $blog)
    {
        return $blog->update($request->validated());
    }

}