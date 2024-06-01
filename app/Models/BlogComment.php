<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // BelongsTo added
use Illuminate\Database\Eloquent\Relations\MorphMany; // MorphMany added
// use Illuminate\Database\Eloquent\Relations\HasMany; // BelongsTo added


class BlogComment extends Model
{
    use HasFactory;


    protected $fillable = ['comment', 'user_id', 'blog_id', 'parent_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function likes(): MorphMany
    {
        // return $this->hasMany(Like::class, 'likeable_id')->where('likeable_type', Blog::class);
        return $this->morphMany(Like::class, 'likeable');  // with likable column to likes migration table
    }
    

    /**
     * Get all of the comment's replies.
     */
    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

    /**
     * Get the parent comment.
     */
    public function parent()
    {
        return $this->belongsTo(BlogComment::class, 'parent_id');
    }

}
