<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Authentication extends Model
{
    use HasFactory;

    protected $table = 'authentication';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_name',
        'password',
        'suppliers',
        'last_access_date',
        'state'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'authen_id');
    }
}
