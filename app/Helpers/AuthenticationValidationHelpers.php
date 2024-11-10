<?php

namespace App\Helpers;

class AuthenticationValidationHelpers
{
    public static function validateUserName()
    {
        return [
            'rules' => [
                'required',
                'string',
                'unique:authentication,user_name',
            ],
            'messages' => [
                'user_name.required' => 'El nombre de usuario es obligatorio.',
                'user_name.string' => 'El nombre de usuario debe ser una cadena de texto.',
                'user_name.unique' => 'El nombre de usuario ya está en uso.',
            ],
        ];
    }

    public static function validatePassword()
    {
        return [
            'rules' => [
                'required',
                'string',
                'min:8',              
                'regex:/[a-z]/',     
                'regex:/[A-Z]/',     
                'regex:/[0-9]/',    
            ],
            'messages' => [
                'password.required' => 'La contraseña es obligatoria.',
                'password.string' => 'La contraseña debe ser una cadena de texto.',
                'password.min:8' => 'La contraseña debe contner mínimo 8 caracteres.',
                'password.regex' => 'La contraseña no cumple con el formato requerido. Debe incluir al menos una letra minúscula, una mayúscula, y un número.',
            ],
        ];
    }

    public static function validateSuppliers()
    {
        return [
            'rules' => [
                'required',
                'string',
                'in:correo y contraseña'
            ],
            'messages' => [
                'suppliers.required' => 'El proveedor es obligatorio.',
                'suppliers.string' => 'El proveedor debe ser una cadena de texto.',
                'suppliers.in' => 'Proveedor no valido.',
            ]
        ];
    }

    public static function validateLastAccessDate()
    {
        return [
            'rules' => [
                'date',
                'date_format:Y-d-m'
            ],
            'messages' => [
                'last_access_date.date' => 'La fecha debe ser válida.',
                'last_access_date.date_format' => 'La fecha debe estar en el formato YYYY-DD-MM.',
            ]
        ];
    }

    public static function validateState()
    {
        return [
            'rules' => [
                'required',
                'in:activo,creado,desactivo'
            ],
            'messages' => [
                'state.required' => 'El estado de la cuenta es obligatorio.',
                'state.in' => 'Estado no valido.'
            ]
        ];
    }
}
