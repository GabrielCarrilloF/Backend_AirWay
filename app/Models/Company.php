<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'id',
        'id_authen',
        'plan_id',
        'name',
        'email',
        'phone_number',
        'address',
        'contact_person'
    ];
}
