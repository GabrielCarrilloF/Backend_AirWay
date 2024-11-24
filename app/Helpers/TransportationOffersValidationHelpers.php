<?php

namespace App\Helpers;

class TransportationOffersValidationHelpers
{
    public static function validateIdVehicle()
    {
        return [
            'rules' => ['required', 'exists:vehicle,vehicle_registration'],
            'messages' => [
                'id_vehicle.required' => 'El ID del vehículo es obligatorio.',
                'id_vehicle.exists' => 'El ID del vehículo debe existir en la tabla de vehículos.',
            ],
        ];
    }

    public static function validateOrigin()
    {
        return [
            'rules' => ['required', 'string', 'max:255'],
            'messages' => [
                'origin.required' => 'El origen es obligatorio.',
                'origin.string' => 'El origen debe ser un texto.',
                'origin.max' => 'El origen no puede exceder 255 caracteres.',
            ],
        ];
    }

    public static function validateDestination()
    {
        return [
            'rules' => ['required', 'string', 'max:255'],
            'messages' => [
                'destination.required' => 'El destino es obligatorio.',
                'destination.string' => 'El destino debe ser un texto.',
                'destination.max' => 'El destino no puede exceder 255 caracteres.',
            ],
        ];
    }

    public static function validateDepartureDate()
    {
        return [
            'rules' => ['required', 'date', 'before_or_equal:arrival_date'],
            'messages' => [
                'departure_date.required' => 'La fecha de salida es obligatoria.',
                'departure_date.date' => 'La fecha de salida debe ser válida.',
                'departure_date.before_or_equal' => 'La fecha de salida debe ser anterior o igual a la de llegada.',
            ],
        ];
    }

    public static function validateArrivalDate()
    {
        return [
            'rules' => ['required', 'date', 'after_or_equal:departure_date'],
            'messages' => [
                'arrival_date.required' => 'La fecha de llegada es obligatoria.',
                'arrival_date.date' => 'La fecha de llegada debe ser válida.',
                'arrival_date.after_or_equal' => 'La fecha de llegada debe ser posterior o igual a la de salida.',
            ],
        ];
    }

    public static function validateDepartureTime()
    {
        return [
            'rules' => ['required', 'date_format:H:i'],
            'messages' => [
                'departure_time.required' => 'La hora de salida es obligatoria.',
                'departure_time.date_format' => 'La hora de salida debe estar en formato HH:mm.',
            ],
        ];
    }

    public static function validateArrivalTime()
    {
        return [
            'rules' => ['required', 'date_format:H:i'],
            'messages' => [
                'arrival_time.required' => 'La hora de llegada es obligatoria.',
                'arrival_time.date_format' => 'La hora de llegada debe estar en formato HH:mm.',
            ],
        ];
    }

    public static function validatePrice()
    {
        return [
            'rules' => ['required', 'numeric', 'min:0'],
            'messages' => [
                'price.required' => 'El precio es obligatorio.',
                'price.numeric' => 'El precio debe ser un número.',
                'price.min' => 'El precio debe ser mayor o igual a 0.',
            ],
        ];
    }

    public static function validatePreviousPrice()
    {
        return [
            'rules' => ['nullable', 'numeric', 'min:0'],
            'messages' => [
                'previous_price.numeric' => 'El precio anterior debe ser un número.',
                'previous_price.min' => 'El precio anterior debe ser mayor o igual a 0.',
            ],
        ];
    }

    public static function validateAdditionalInformation()
    {
        return [
            'rules' => ['nullable', 'string', 'max:500'],
            'messages' => [
                'additional_information.string' => 'La información adicional debe ser texto.',
                'additional_information.max' => 'La información adicional no puede exceder 500 caracteres.',
            ],
        ];
    }
}
