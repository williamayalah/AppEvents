<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'capacity' => 'required|numeric|min:1',
            'slug' => 'required|unique:events,slug',
            'date' => 'required',
            'categoryId' => 'required',
            'eventDescription' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'capacity.required' => 'De ingresar aforo',
            'slug.required' => 'Debe ingresar Slug',
            'slug.unique'=>'Este slug ya se encuentra registrado',
            'date.required' => 'Debe ingresar la fecha actual o posterior',
            'eventDescription.required' => 'Debe ingresar descripciones de evento',
            'capacity.numeric' => 'El aforo debe ser un número',
            'capacity.min' => 'El aforo debe ser mayor que 0',
        ];
    }
}
