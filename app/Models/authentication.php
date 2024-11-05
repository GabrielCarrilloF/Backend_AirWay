<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class authentication extends Model
{
    protected $table = 'authentication';

    protected $fillable = [
        'user_name',
        'passaword',
        'suppliers',
        'last_access_date',
        'state'
    ];
}
