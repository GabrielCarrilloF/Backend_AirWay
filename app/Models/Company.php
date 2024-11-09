<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'type_company',
        'email',
        'phone_number',
        'address',
        'contact_person',
        'authen_id',
        'plan_id'
    ];

    public function authentication()
    {
        return $this->belongsTo(Authentication::class, 'authen_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
