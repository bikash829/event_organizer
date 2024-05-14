<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'subject' => 'required|string|max:50',
            'message' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'Name is required',
    //         'name.string' => 'Name must be a string',
    //         'name.max' => 'Name must not be greater than 50 characters',
    //         'email.required' => 'Email is required',
    //         'email.email' => 'Email must be a valid email',
    //         'phone.required' => 'Phone is required',
    //         'phone.string' => 'Phone must be a string',
    //         'phone.max' => 'Phone must not be greater than 15 characters',
    //         'subject.required' => 'Subject is required',
    //         'subject.string' => 'Subject must be a string',
    //         'subject.max' => 'Subject must not be greater than 50 characters',
    //         'message.required' => 'Message is required',
    //         'message.string' => 'Message must be a string',
    //     ];
    // }
}
