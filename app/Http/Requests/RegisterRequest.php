<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'max:25']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Данное поле обязательно',
            'email.required' => 'Данное поле обязательно',
            'password.required' => 'Данное поле обязательно',
            'name.min' => 'Минимум 3 символа',
            'password.min' => 'Минимум 8 символов',
            'password.max' => 'Максимум 25 символов',
            'email.unique' => 'Такой email уже существует',
            'email.email' => 'Введите email',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}
