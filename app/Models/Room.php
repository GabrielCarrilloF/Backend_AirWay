<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     protected $table = 'rooms';
     protected $keyType = 'string';
     public $incrementing = false;

     protected $primaryKey = 'id';

    
    protected $fillable = [
        'id',
        'room_number',
        'company_id',
        'room_type',
        'room_size',
        'room_capacity',
        'amenities',
        'photos',
        'room_status',
        'description'
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
