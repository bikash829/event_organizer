<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // BelongsTo added
use Illuminate\Database\Eloquent\Relations\HasMany; // BelongsTo added

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



}
