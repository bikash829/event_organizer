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


    /**
     * Blog belongs to user 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Blog has many comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }


    /**
     * Relationship with likes table using morph to 
     */
    public function likes(): morphMany
    {
        return $this->morphMany(Like::class, 'likeable'); // with likable column to likes migration table
    }



}
