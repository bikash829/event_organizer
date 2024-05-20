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
        $check = $model->likes()->where('user_id', auth()->id() ?? 1)->first();
        if (!empty($check)) {
            return $model->likes()->where('user_id', auth()->id() ?? 1)->delete();
        } else {
            return $model->likes()->create(['user_id' => auth()->id() ?? 1]);
        }
    }

}
