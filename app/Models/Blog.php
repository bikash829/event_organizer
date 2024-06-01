<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // BelongsTo added
use Illuminate\Database\Eloquent\Relations\HasMany; // BelongsTo added
use Illuminate\Database\Eloquent\Relations\morphMany; // MorphMany added

use App\Models\Like; // Like model
use Illuminate\Support\Facades\Auth;
// Media library package
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Blog extends Model implements HasMedia // HasMedia added
{
    use InteractsWithMedia; // InteractsWithMedia added
    use HasFactory;

    protected $fillable = ['title', 'content', 'published_at', 'user_id'];


    /**
     * Register the media collections
     */
    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('preview')
    //         ->fit(Fit::Contain, 300, 300)
    //         ->nonQueued();
    // }
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
