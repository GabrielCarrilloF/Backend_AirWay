<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportationOffer extends Model
{
    protected $table = 'transportation_offers';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'id_vehicle',
        'origin',
        'destination',
        'departure_date',
        'arrival_date',
        'departure_time',
        'arrival_time',
        'price',
        'previous_price',
        'additional_information'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle', 'vehicle_registration');
    }
}
