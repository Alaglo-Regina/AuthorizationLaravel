<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name" => "required|string|max:64|min:4|unique:users",
            "email" => "required|email|max:150|min:4|unique:users",
            "password" => "required|string|min:8",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'le nom est requis',
            'name.min' => 'Le nom doit contenir au moins 3 caractères',
            'name.max' => 'Le nom doit contenir au plus 255 caractères',
            'email.required' => 'Email est requise',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
        ];

    }
}
