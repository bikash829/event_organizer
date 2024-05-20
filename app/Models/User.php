<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany; // Relationship added
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'date_of_birth',
        'phone',
        'identity_type',
        'identity',
        'city',
        'address',
        'zip_code',
        'is_verified',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's is_verified attribute.
     *
     * @param  bool  $value
     * @return string
     */
    // public function getIsVerifiedAttribute($value)
    // {
    //     return $value ? 'yes' : 'no';
    // }


    /**
     * Has many relationship with Blog
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
    /**
     * Has many relationship with BlogComment   
     */
    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

    /**
     * Has many relationship with Like
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
