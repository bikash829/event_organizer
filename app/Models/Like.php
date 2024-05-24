<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'likeable_id', 'likeable_type'];  // auto generated likable_id, likable_type from likable morph migration column

    public function likeable(): MorphTo
    {
        return $this->morphTo(); // relationship 
    }
}
