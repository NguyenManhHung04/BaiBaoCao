<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreUserRequest extends FormRequest
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
            'phone'=>'required',
            'email'=>'required',
            'username'=>'required',
            'password'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Tên danh mục không để trống!',
            'phone.required'=>'Tên danh mục không để trống!',
            'email.required'=>'Tên danh mục không để trống!',
            'username.required'=>'Tên danh mục không để trống!',
            'password.required'=>'Tên danh mục không để trống!',

        ];
    }
}
