<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatingUserRequest extends FormRequest
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
            'email' => ['required','email'],
            'password' => ['required','confirmed','string'],
            'password_confirmation' => ['required','string']
        ];
    }

    public function messages()
    {
        return  [
            'name.required' => "Le nom est obligatoire",
            'email.required' => "L'email est obligatoire",
            'password.required' => 'Le mot de passe est obligatoire',
            'password.confirmed' => "Les mot de passes sont differents"
        ];
    }
}
