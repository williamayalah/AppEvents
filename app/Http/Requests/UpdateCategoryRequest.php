<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'slug' => 'required',
            'categoryDescription' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'slug.required' => 'Debe ingresar un Slug',
            'categoryDescription.required' => 'Debe ingresar descripciones de categoría'        ];
    }
}
