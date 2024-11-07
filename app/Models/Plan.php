<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'plan_name',
        'percentage_fee',
        'description',
        'price'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'plan_id');
    }
}
