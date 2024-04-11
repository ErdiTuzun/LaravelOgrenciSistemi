<?php

namespace App\Http\Requests\Auth;

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
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'E-mail alanı zorunludur',
            'email.email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
            'email.unique' => 'E-mail adresi kayıtlıdır.',

            'phone.required' => 'Telefon alanı zorunludur',
            'phone.unique' => 'Telefon numarası kayıtlıdır',

            'role.required' => 'Rol alanı zorunludur.',

            'password.required' => 'Parola alanı zorunludur',
            'password.min' => 'Lütfen en az :min karakter parola giriniz',
        ];
    }
}
