<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // BelongsTo added
// use Illuminate\Database\Eloquent\Relations\HasMany; // BelongsTo added

class BlogComment extends Model
{
    use HasFactory;


    protected $fillable = ['comment', 'user_id', 'blog_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
