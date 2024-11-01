<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

 
    public function rules(): array
    {
        return [
            'name' =>'required|min:2',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Không Để Trống',
            'name.min' =>'Trên 2 kí tự',

        ];
    }
}