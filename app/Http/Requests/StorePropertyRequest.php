<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'building_age' => ['nullable', 'max:100'],
            'name' => ['nullable', 'max:100'],
            'parking' => ['nullable', 'max:100'],
            'cooling' => ['nullable', 'max:100'],
            'heating' => ['nullable', 'max:100'],
            'sewer' => ['nullable', 'max:100'],
            'water' => ['nullable', 'max:100'],
            'torage_room' => ['nullable', 'max:100'],
            'exercise_room' => ['nullable', 'max:100'],
            'slug' => ['nullable', 'unique:properties,slug'],
            'description' => ['required', 'max:1000'],
            'tags' => ['nullable'],
            'categories' => ['array','nullable'],
            'location' => ['nullable', 'max:100'],
            'city_id' => ['required', 'exists:cities,id']
        ];
    }
}
