<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:8', 'max:25']
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Данное поле обязательно',
            'email.email' => 'Введите email',
            'password.required' => 'Данное поле обязательно',
            'password.min' => 'Минимум 8 символов',
            'password.max' => 'Максимум 25 символов'
        ];
    }
}
