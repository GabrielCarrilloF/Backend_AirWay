<?php

namespace App\Helpers;

use App\Models\Room;
use App\Traits\CompanyValidationTrait;

class HotelOffersValidationHelpers
{
    use CompanyValidationTrait;

    public static function validateRoomId($data)
    {
        return [
            'rules' => [
                'required',
                function ($attribute, $value, $fail) use ($data) {
                    $roomBelongsToCompany = Room::where('id', $value)
                        ->where('company_id', $data['company_id'] ?? null)
                        ->exists();

                    if (!$roomBelongsToCompany) {
                        $fail("La habitación con ID '{$value}' no pertenece a la compañía especificada.");
                    }
                },
            ],
            'messages' => [
                'room_id.required' => 'El ID de la habitación es obligatorio.',
            ],
        ];
    }

    public static function validatePricePerNight()
    {
        return [
            'rules' => [
                'required',
                'numeric',
                'min:0',
            ],
            'messages' => [
                'price_per_night.required' => 'El precio por noche es obligatorio.',
                'price_per_night.numeric' => 'El precio por noche debe ser un número.',
                'price_per_night.min' => 'El precio por noche debe ser mayor o igual a 0.',
            ],
        ];
    }

    public static function validateAvailableFrom()
    {
        return [
            'rules' => [
                'required',
                'date_format:Y-m-d',
                'before_or_equal:available_until',
            ],
            'messages' => [
                'available_from.required' => 'La fecha de inicio de disponibilidad es obligatoria.',
                'available_from.date_format' => 'La fecha de inicio debe estar en el formato Y-m-d (e.g., 2024-12-31).',
                'available_from.before_or_equal' => 'La fecha de inicio debe ser anterior o igual a la fecha de fin de disponibilidad.',
            ],
        ];
    }

    public static function validateAvailableUntil()
    {
        return [
            'rules' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:available_from',
            ],
            'messages' => [
                'available_until.required' => 'La fecha de fin de disponibilidad es obligatoria.',
                'available_until.date_format' => 'La fecha de fin debe estar en el formato Y-m-d (e.g., 2024-12-31).',
                'available_until.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio de disponibilidad.',
            ],
        ];
    }
}
