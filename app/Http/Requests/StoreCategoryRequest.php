<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'slug' => 'required|unique:categories,slug',
            'categoryDescription'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'slug.required'=>'Debe ingresar un slug',
            'slug.unique'=>'Este slug ya se encuentra registrado',
            'categoryDescription.required'=>'Debe agregar descripciones de categoría',
         ];
    }
}
