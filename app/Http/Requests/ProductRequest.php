<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'model' => 'required',
            'city' => 'required',
            'license' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'city.required' => 'City field is required',
    //         'category.required' => 'Category field is required'
    //     ];
    // }
}
