<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';
    protected $primaryKey = 'vehicle_registration';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'vehicle_registration',
        'company_id',
        'vehicle_model',
        'total_seats',
        'occupied_seats',
        'amenities',
        'vehicle_status',
        'vehicle_type'
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function transportationOffers()
    {
        return $this->hasMany(TransportationOffer::class, 'id_vehicle', 'vehicle_registration');
    }

}
