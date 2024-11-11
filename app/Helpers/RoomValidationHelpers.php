<?php

namespace App\Helpers;

use App\Models\Room;
use App\Traits\CompanyValidationTrait;

class RoomValidationHelpers
{
    use CompanyValidationTrait;

    public static function validateRoomNumber($data)
    {
        return [
            'rules' => [
                    'required',
                    'string',
                    function ($attribute, $value, $fail) use ($data) {
                        $exists = Room::where('room_number', $value)
                                    ->where('company_id', $data['company_id'])
                                    ->exists();

                        if ($exists) {
                            $fail("El número de habitación '{$value}' ya está registrado para esta compañía.");
                        }
                    },
            ],
            'messages' => [
                'room_number.required' => 'El número de habitación es obligatorio.',
                'room_number.string' => 'El número de habitación debe ser una cadena de texto.',
            ],
        ];
    }

    public static function validateRoomType()
    {
        return [
            'rules' => [
                'required',
                'string',
                'in:individual,doble,triple,suite,suite presidencial,familiar,de lujo,accesibilidad,vista',
            ],
            'messages' => [
                'room_type.required' => 'El tipo de habitación es obligatorio.',
                'room_type.string' => 'El tipo de habitación debe ser una cadena de texto.',
                'room_type.in' => 'El tipo de habitación debe ser uno de los siguientes: individual, doble, triple, suite, suite presidencial, familiar, de lujo, accesibilidad o vista.',
            ],
        ];
    }

    public static function validateRoomSize()
    {
        return [
            'rules' => [
                'required',
                'string',
                'regex:/^(\d+(\.\d+)?\s?(ft²|sqft|m²|m³))$/',
            ],
            'messages' => [
                'room_size.required' => 'El tamaño de la habitación es obligatorio.',
                'room_type.string' => 'El tamaño de la habitación debe ser una cadena de texto.',
                'room_size.regex' => 'El tamaño de la habitación debe estar en uno de los siguientes formatos válidos: número seguido de ft², sqft, m², o m³.',
            ],
        ];
    }

    public static function validateRoomCapacity()
    {
        return [
            'rules' => [
                'required',
                'numeric',
                'min:1',
                'max:15',
            ],
            'messages' => [
                'room_capacity.required' => 'La capacidad de la habitación es obligatoria.',
                'room_capacity.numeric' => 'La capacidad de la habitación debe ser un número.',
                'room_capacity.min' => 'La capacidad mínima de la habitación es 1.',
                'room_capacity.max' => 'La capacidad máxima de la habitación es 15.',
            ],
        ];
    }

    public static function validateAmenities()
    {
        return [
            'rules' => [
                'required',
                'string',
            ],
            'messages' => [
                'amenities.required' => 'Los servicios incluidos en la habitación son obligatorios (e.g., Wifi, aire acondicionado, cocina, baño).',
                'amenities.string' => 'Debe ser una cadena de texto.',
            ],
        ];
    }

    public static function validatePhotos()
    {
        return [
            'rules' => [
                'required',
                'string',
                'regex:/^(\S+\.\w+)(~\S+\.\w+)*$/',
            ],
            'messages' => [
                'photos.required' => 'Las fotos son obligatorias.',
                'photos.string' => 'El campo de fotos debe ser una cadena de texto.',
                'photos.regex' => 'Las fotos deben estar en formato de URLs válidas, separadas por el símbolo ~ si son múltiples (Ejemplo: Foto1.png~Foto2.jpg~foto3.jpeg).',
            ],
        ];
    }

    public static function validateRoomStatus()
    {
        return [
            'rules' => [
                'required',
                'string',
                'in:disponible, ocupado, mantenimiento, reparacion'
            ],
            'messages' => [
                'room_status.required' => 'El estado son obligatorias.',
                'room_status.string' => 'Debe ser una cadena de texto.',
                'room_status.in' => 'El estado deben estar en disponible, ocupado, mantenimiento o reparacion.',
            ],
        ];
    }

}
