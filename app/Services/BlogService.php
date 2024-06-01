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
            'comments' => function (Builder $query) {
                $query->orderBy('created_at', 'desc');
            },

        ])
            ->withCount([
                'likes',
                'comments',
                'likes as authLiked' => function ($query) {
                    $query->where('user_id', auth()->id());
                }
            ]) // eager loading to count likes and comments those are modal functions

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
                $query->orderBy('created_at', 'desc');
            },

        ])
            ->withCount([
                'likes',
                'comments',
                'likes as authLiked' => function ($query) {
                    $query->where('user_id', auth()->id());
                },
            ]) // eager loading to count likes and comments those are modal functions
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
        $blog = Blog::create($data);
        if(isset($data['image'])){
            $blog->addMedia($data['image'])
            ->toMediaCollection();
        }
        return $blog;
    }

    /**
     * Getting a single blog
     */
    public function show($blog)
    {
        $blog->load([
            'user:id,first_name,last_name,email',
            'comments' => function (Builder $query) {
                $query->orderBy('created_at', 'desc')
                    ->with([
                        'user:id,first_name,last_name,email',
                        'replies' => function (Builder $query) {
                            $query->orderBy('created_at', 'desc')
                                ->with([
                                    'user:id,first_name,last_name,email',
                                ])
                                ->withCount([
                                    'likes',
                                    'likes as authLiked' => function (Builder $query) {
                                        $query->where('user_id', auth()->id());
                                    },
                                ]);
                        },
                    ])
                    ->withCount([
                        'likes',
                        'replies',
                        'likes as authLiked' => function ($query) {
                            $query->where('user_id', auth()->id());
                        }
                    ])

                    ->whereNull('parent_id');
            },
        ])
            ->loadCount([
                'likes',
                'comments',
                'likes as authLiked' => function ($query) {
                    $query->where('user_id', auth()->id());
                }
            ])

        ;


        // dd($blog->toArray());

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
        $blog->clearMediaCollection();
        
        if(isset($request->image)){
            $blog->addMedia($request->image)
            ->toMediaCollection();
        }
        return $blog->update($request->validated());
    }

}