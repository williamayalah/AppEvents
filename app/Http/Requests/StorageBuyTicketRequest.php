<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class StorageBuyTicketRequest extends FormRequest
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
        'email'=>'required|email',
        'quantity'=>'required|numeric|min:1'
        ];
    }
    public function messages(){
        return[
            'email.required'=>'El email es requerido',
            'email.email'=>'El email debe tener el siguiente formato user@example.com',
            'quantity.required'=>'La cantidad de entradas es requerida',
            'quantity.numeric'=>'La cantidad de entradas debe ser un numero',
            'quantity.min'=>'La cantidad de entradas a adquirir debe ser mayor a 0',
        ];
    }
}
