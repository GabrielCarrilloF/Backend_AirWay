<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class authentication extends Model
{
    protected $table = 'authentication';

    protected $fillable = [
        'id',
        'user_name',
        'password',
        'suppliers',
        'last_access_date',
        'state'
    ];
}
