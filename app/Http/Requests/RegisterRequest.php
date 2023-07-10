<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * Adicionalmente se controla el registro
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'username' => 'required|min:3',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|same:password',
            'direccion' => 'required|min:3',
            'codigopostal' => 'required|min:3',
            'telefono' => 'required|min:3',
        ];
    }
}
