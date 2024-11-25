<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelOffers extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hotel_offers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'company_id',
        'room_id',
        'price_per_night',
        'available_from',
        'available_until',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'available_from' => 'date:Y-m-d',
        'available_until' => 'date:Y-m-d',
    ];

    /**
     * Get the company that owns the hotel offer.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Get the room associated with the hotel offer.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
