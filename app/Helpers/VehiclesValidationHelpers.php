<?php

namespace App\Helpers;
use App\Traits\CompanyValidationTrait;

class VehiclesValidationHelpers
{
    use CompanyValidationTrait;

    public static function validateVehicleRegistration()
    {
        return [
            'rules' => [
                'required',
                'string',
                'unique:vehicle,vehicle_registration',
            ],
            'messages' => [
                'vehicle_registration.required' => 'La matrícula del vehículo es obligatoria.',
                'vehicle_registration.string' => 'La matrícula del vehículo debe ser una cadena de texto.',
                'vehicle_registration.unique' => 'La matrícula del vehículo ya está registrada.',
            ],
        ];
    }

    public static function validateVehicleModel()
    {
        return [
            'rules' => [
                'required',
                'string',
            ],
            'messages' => [
                'vehicle_model.required' => 'El modelo del vehículo es obligatorio.',
                'vehicle_model.string' => 'El modelo del vehículo debe ser una cadena de texto.',
            ],
        ];
    }

    public static function validateTotalSeats()
    {
        return [
            'rules' => [
                'required',
                'integer',
                'min:1',
            ],
            'messages' => [
                'total_seats.required' => 'El número total de asientos es obligatorio.',
                'total_seats.integer' => 'El número total de asientos debe ser un número entero.',
                'total_seats.min' => 'El número total de asientos debe ser al menos 1.',
            ],
        ];
    }

    public static function validateVehicleStatus()
    {
        return [
            'rules' => [
                'required',
                'in:Disponible,Ocupado,Mantenimiento,Reparación',
            ],
            'messages' => [
                'vehicle_status.required' => 'El estado del vehículo es obligatorio.',
                'vehicle_status.in' => 'El estado del vehículo debe ser uno de los siguientes: Disponible, Ocupado, Mantenimiento, Reparación.',
            ],
        ];
    }

    public static function validateVehicleType()
    {
        return [
            'rules' => [
                'required',
                'in:bus,avion',
            ],
            'messages' => [
                'vehicle_type.required' => 'El tipo de vehículo es obligatorio.',
                'vehicle_type.in' => 'El tipo de vehículo debe ser uno de los siguientes: bus, avión.',
            ],
        ];
    }

    public static function validateAmenities()
    {
        return [
            'rules' => [
                'nullable',
                'string',
            ],
            'messages' => [
                'amenities.string' => 'Los servicios deben ser una cadena de texto.',
            ],
        ];
    }

public static function validateOccupiedSeats()
{
    return [
        'rules' => [
            'occupied_seats' => ['nullable', 'integer', 'min:0', function ($attribute, $value, $fail) {
                
                $totalSeats = request()->input('total_seats');
                
                
                if (!is_null($value) && !is_null($totalSeats) && $value > $totalSeats) {
        
                    $fail('El número de asientos ocupados no puede ser mayor que el número total de asientos.');
                }
            }],
        ],
        'messages' => [
            'occupied_seats.integer' => 'El número de asientos ocupados debe ser un número entero.',
            'occupied_seats.min' => 'El número de asientos ocupados no puede ser negativo.',
        ]
    ];
}


}
