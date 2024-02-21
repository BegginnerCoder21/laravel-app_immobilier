<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyFeatureRequest extends FormRequest
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
            'area' => ['required', 'numeric', 'min:1'],
            'rooms' => ['required', 'numeric', 'min:1'],
            'bedrooms' => ['required', 'numeric', 'min:1'],
            'bathrooms' => ['required', 'numeric', 'min:1'],
        ];
    }
}
