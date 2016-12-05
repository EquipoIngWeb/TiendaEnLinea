<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'gender_id' => 'required|exists:genders,id',
            'name' => 'required|max:255',
            'image' => 'image|unique:categories|dimensions:min_width=900,min_height=200'
        ];
    }
}
