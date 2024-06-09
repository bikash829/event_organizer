<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'service_category_id' => 'required|exists:service_categories,id',
            'vendor_id' => 'required|exists:users,id',
            'service_name' => 'required|string|max:100',
            'description' => 'required|string',
            'is_available' => 'in:yes,no',

        ];
    }
}
