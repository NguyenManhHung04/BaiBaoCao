<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'=>'Tên danh mục không để trống!',
        ];
    }
}
