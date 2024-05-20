<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Traits\LikeTrait; // Like Trait

class BlogCommentService
{
    use LikeTrait;
    /**
     * Create a new class instance.
     */


    /**
     * Store comment 
     */
    public function store($request, $blog)
    {
        $request['user_id'] = 1;
        return $blog->comments()->create($request->all());
    }

    /**
     * Like comment 
     */
    public function like($blogComment)
    {
        // $this->blogService->like($blog);
        // dd($blogComment);
        $blogComment = $this->likable($blogComment);
        return $blogComment;

    }

}
