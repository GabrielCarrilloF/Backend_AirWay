<?php

namespace App\Helpers;

use App\Models\Plan;
use App\Traits\CompanyValidationTrait;

class PaymentsValidationHelpers
{
    use CompanyValidationTrait;

    public static function validatePlanId()
    {
        return [
            'rules' => [
                'required',
                'exists:plan,id',
            ],
            'messages' => [
                'plan_id.required' => 'El ID del plan es obligatorio.',
                'plan_id.exists' => 'El ID del plan no existe en el sistema.',
            ],
        ];
    }

    public static function validatePaymentDay()
    {
        return [
            'rules' => [
                'required',
                'date',
                'date_format:Y-d-m'
            ],
            'messages' => [
                'payment_day.required' => 'El día de pago es obligatorio.',
                'payment_day.date' => 'El día de pago debe ser una fecha válida.',
            ],
        ];
    }

    public static function validateAmountPaid($data)
    {
        return [
            'rules' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($data) {
                    $plan = Plan::find($data['plan_id']);
                    if ($plan && $value != $plan->price) {
                        $fail("El monto a pagar debe ser exactamente {$plan->price} para el plan seleccionado.");
                    }
                },
            ],
            'messages' => [
                'amount_paid.required' => 'El monto pagado es obligatorio.',
                'amount_paid.numeric' => 'El monto pagado debe ser un número.',
                'amount_paid.min' => 'El monto pagado no puede ser negativo.',
            ],
        ];
    }

    public static function validatePaymentType()
    {
        return [
            'rules' => [
                'required',
                'string',
                'in:descuento,tarjeta'
            ],
            'messages' => [
                'payment_type.required' => 'El tipo de pago es obligatorio.',
                'payment_type.string' => 'El tipo de pago debe ser una cadena de texto.',
                'payment_type.in' => 'El tipo de pago no es valido.',
            ],
        ];
    }
}

