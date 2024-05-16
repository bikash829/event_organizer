<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogComment;

class BlogCommentService
{
    /**
     * Create a new class instance.
     */

    public function store($request, $blog)
    {
        $request['user_id'] = 1;
        return $blog->comments()->create($request->all());
    }

}
