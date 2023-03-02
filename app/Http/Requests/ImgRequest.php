<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImgRequest extends FormRequest
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
            'image' => ['required', 'array'],
            'image.*' => ['required', 'image', 'file', 'mimes:jpg,jpeg,png,bmp,ico', 'dimensions:max_width=7000, max_height=7000', 'max:5000000'],
            'width' => ['nullable', 'numeric', 'min:20', 'max:10000'],
            'height' => ['nullable', 'numeric', 'min:20', 'max:10000']
        ];
    }
    public function messages()
    {
        return [
          'image.*.image' => 'Доступны только форматы jpg,jpeg,png,bmp,ico',
            'image.required' => 'Поле обязательно',
        ];
    }
}
