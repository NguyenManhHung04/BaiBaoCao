<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreProductRequest extends FormRequest
{
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
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Tên danh mục không để trống!',
            'category_id.required'=>'Tên danh mục không để trống!',
            'brand_id.required'=>'Tên danh mục không để trống!',
        ];
    }
}
