<?php

namespace App\Traits;

// use App\Models\Blog;
// use App\Models\BlogComment;
// use Illuminate\Support\Facades\Auth;

trait LikeTrait
{
    /**
     * Create a new class instance.
     */

    public function likable($model)
    {
        // return $model->likes()->firstOrCreate(['user_id' => auth()->id() ?? 1]);
        // $this->blogService->like($blog);
        /*
            Like::create([
                'user_id' => 1,
                'likeable_id' => $blog->id,
                'likeable_type' => get_class($blog)
            ]); 
        */

        // OR

        // $blog->likes()->create(['user_id' => 1]);

        // OR

        $check = $model->likes()->where('user_id', auth()->id())->first();

        if (!empty($check)) {
            return $model->likes()->where('user_id', auth()->id())->delete();
        } else {
            return $model->likes()->create(['user_id' => auth()->id()]);
        }
    }

}
