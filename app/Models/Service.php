<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    use HasFactory;


    protected $fillable = [
        'service_category_id',
        'vendor_id',
        'service_name',
        'description',
        'is_available',
    ];


    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
