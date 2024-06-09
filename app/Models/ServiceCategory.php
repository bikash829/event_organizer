<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// import facades
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\BelongsTo; // BelongsTo added
use Illuminate\Database\Eloquent\Relations\HasMany; // HasMany added

class ServiceCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'description',
        'status',
        'parent_id',
    ];



    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'parent_id');
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id')->with('subcategories');
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
