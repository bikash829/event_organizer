<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'title' => 'required|min:10|max:255',
            'content' => 'required|min:20',
            // 'published_at' => 'sometimes|required|date',
            // 'user_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 10 characters',
            'title.max' => 'Title must not be greater than 255 characters',
            'content.required' => 'Content is required',
            'content.min' => 'Content must be at least 20 characters',
            // 'published_at.required' => 'Published at is required',
            // 'published_at.date' => 'Published at must be a valid date',
            'user_id.required' => 'User ID is required',
        ];
    }
}
