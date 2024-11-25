<?php

namespace App\Traits;

trait CompanyValidationTrait
{
    public static function validateCompanyId()
    {
        return [
            'rules' => [
                'required',
                'exists:company,name',
            ],
            'messages' => [
                'company_id.required' => 'El ID de la compañía es obligatorio.',
                'company_id.exists' => 'El ID de la compañía no existe en el sistema.',
            ],
        ];
    }
}
