<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages(): array
    {
        return [
          'name.required' => "İsim alanı zorunludur.",
          'name.string' => "Lütfen geçerli bir isim giriniz.",
          'name.max' => "En fazla 50 karakter geçerlidir.",


          'email.required' => "E-posta alanı zorunludur.",
          'email.string' => "Lütfen geçerli bir E-posta giriniz.",
          'email.lowercase' => "E-posta alanı küçük harf olmalıdır.",
          'email.email' => "Lütfen geçerli bir e-posta adresi giriniz.",


        ];
    }
}
