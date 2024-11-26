<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'nombre_usuario',
        'identificacion_usuario',
        'correo_usuario',
        'edad_usuario',
        'telefono_usuario',
        'id_offer',
        'companyName',
    ];

    public function transportationOffer()
    {
        return $this->belongsTo(TransportationOffer::class, 'id_offer', 'id');
    }
}
