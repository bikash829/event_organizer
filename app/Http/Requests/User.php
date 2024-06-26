<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Relations\HasMany; // HasMany added
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Blog; // Blog added
use App\Models\BlogComment; // BlogComment added

class User extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }


    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

}
