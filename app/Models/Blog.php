<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // BelongsTo added
use Illuminate\Database\Eloquent\Relations\HasMany; // BelongsTo added
use Illuminate\Database\Eloquent\Relations\morphMany; // MorphMany added

use App\Models\Like; // Like model


class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'published_at', 'image', 'user_id'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }


    // Relationship with likes table using morph to 
    public function likes(): MorphMany
    {
        // return $this->hasMany(Like::class, 'likeable_id')->where('likeable_type', Blog::class);
        return $this->morphMany(Like::class, 'likeable'); // with likable column to likes migration table
    }



}
