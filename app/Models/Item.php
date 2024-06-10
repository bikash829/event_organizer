<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'service_category_id',
        'name',
        'description',
        'quantity',
        'price',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

}
