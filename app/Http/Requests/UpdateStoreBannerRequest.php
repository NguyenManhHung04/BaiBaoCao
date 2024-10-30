<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreBannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Tên danh mục không để trống!',
        ];
    }
}
