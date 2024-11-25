<?php

namespace App\Helpers;
use App\Traits\CompanyValidationTrait;


class ProfileImageValidationHelpers
{
   use CompanyValidationTrait; 

   public static function validateImageUrl()
    {
        return [
            'rules' => [
                'image_url' => 'required',
                'image_url' => 'string',
            ],
            'messages' => [
                'image_url.required' => 'La URL de la imagen es obligatoria.',
                'image_url.string' => 'La URL de la imagen debe ser un string',
            ],
        ];
    }
}
