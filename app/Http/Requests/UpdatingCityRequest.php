<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatingCityRequest extends FormRequest
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
            'name' => ['required','string'],
            'is_active' => ['required','boolean'],
            'image' => ['image']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Le nom de la ville est obligatoire",
            'is_active.required' => "le champ active est obligatoire",
        ];
    }
}
