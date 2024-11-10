<?php

namespace App\Helpers;

class CompanyValidationHelpers
{
    public static function validateAuthenId()
    {
        return [
            'rules' => [
                'required',
                'string',
                'unique:company,authen_id',
                'exists:authentication,id',
            ],
            'messages' => [
                'authen_id.required' => 'El ID de autenticación es obligatorio.',
                'authen_id.string' => 'El ID de autenticación debe ser una cadena de texto.',
                'authen_id.unique' => 'El ID de autenticación ya está en uso por otra compañía.',
                'authen_id.exists' => 'El ID de autenticación no existe en el sistema.',
            ],
        ];
    }

    public static function validatePlanId()
    {
        return [
            'rules' => [
                'required',
                'exists:plan,id',
            ],
            'messages' => [
                'plan_id.required' => 'El ID del plan es obligatorio.',
                'plan_id.exists' => 'El ID del plan seleccionado no es válido.',
            ],
        ];
    }

    public static function validateName()
    {
        return [
            'rules' => [
                'required',
                'string',
                'unique:company,name',
            ],
            'messages' => [
                'name.required' => 'El nombre es obligatorio.',
                'name.string' => 'El nombre debe ser una cadena de texto.',
                'name.unique' => 'El nombre ya está en uso por otra compañía.',
            ],
        ];
    }

    public static function validateTypeCompany()
    {
        return [
            'rules' => [
                'required',
                'string',
                'in:aerolinea,transporte terrestre,hotel',
            ],
            'messages' => [
                'type_company.required' => 'El tipo de compañía es obligatorio.',
                'type_company.string' => 'El tipo de compañía debe ser una cadena de texto.',
                'type_company.in' => 'El tipo de compañía debe ser uno de los siguientes: aerolínea, transporte terrestre o hotel.',
            ],
        ];
    }

    public static function validateEmail()
    {
        return [
            'rules' => [
                'required',
                'email',
                'unique:company,email',
            ],
            'messages' => [
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe tener un formato válido.',
                'email.unique' => 'El correo electrónico ya está en uso por otra compañía.',
            ],
        ];
    }

    public static function validatePhoneNumber()
    {
        return [
            'rules' => [
                'required',
                'digits:10',
                'unique:company,phone_number',
            ],
            'messages' => [
                'phone_number.required' => 'El número de teléfono es obligatorio.',
                'phone_number.digits' => 'El número de teléfono debe tener exactamente 10 dígitos.',
                'phone_number.unique' => 'El número de teléfono ya está en uso por otra compañía.',
            ],
        ];
    }

    public static function validateAddress()
    {
        return [
            'rules' => [
                'nullable',
                'string',
            ],
            'messages' => [
                'address.string' => 'La dirección debe ser una cadena de texto.',
            ],
        ];
    }

    public static function validateContactPerson()
    {
        return [
            'rules' => [
                'nullable',
                'string',
            ],
            'messages' => [
                'contact_person.string' => 'El contacto debe ser una cadena de texto.',
            ],
        ];
    }
}

