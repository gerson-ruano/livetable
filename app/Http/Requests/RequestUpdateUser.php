<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use App\Http\Requests\Rule;
use Illuminate\Validation\Rule;

class RequestUpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules($user)
    {
        $values = [
            'name' => 'required|min:3|max:30',
            'lastname' => 'required|min:3|max:30',
            'email' => ['required', 'email', Rule::unique('users','email')->ignore($user)],
            'role' => 'required|in:client,seller,admin',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ];

        if(!$user){
            $validation_password = [
                'password' => 'required|confirmed'
            ];

            $values = array_merge($values, $validation_password);
        }

        return $values; 
    }

    public function messages()
    {
        return
        [
            'name.required' => 'El campo del nombre es obligatorio',
            'lastname.required' => 'El campo del apellido es obligatorio',
            'email.required' => 'El campo del correo electronico es obligatorio',
            'password.required' => 'El campo de la clave es obligatorio',
            'password.confirmed' => 'El campo de clave y confirmacion de clave deben coincidir',
            'profile_photo_path' => 'El campo de la imagen es obligatorio',
            'profile_photo_path.mimes' => 'El tipo de archivo no es soportado',
            'role.required' => 'Seleccione un role, es obligatorio'
    
        ];
    }
}
