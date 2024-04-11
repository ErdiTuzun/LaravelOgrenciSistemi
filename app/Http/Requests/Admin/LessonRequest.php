<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'name' => 'required',
            'credit' => 'required|numeric|min:3|max:9|integer',
            'code' => 'required|min:3|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ders adı zorunludur',
            'credit.required' => 'Kredi alanı zorunludur',
            'credit.integer' => 'Ders Kodu bir tam sayı olmalıdır',
            'credit.min' => 'Ders Kredisi en az :min`ten büyük olmalıdır',
            'credit.max' => 'Ders Kredisi en fazla :max`ten küçük olmalıdır',
            'code.required' => 'Ders kodu alanı zorunludur',
            'code.min' => 'En az :min karakter uzunluğunda olmalı',
            'code.integer' => 'Ders Kodu bir tam sayı olmalıdır',

        ];
    }
}
