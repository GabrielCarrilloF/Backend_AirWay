<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model

{
    protected $table = 'payment';
    protected $keyType = 'string'; 
    public $incrementing = false; 
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'company_id', 
        'plan_id', 
        'payment_day', 
        'amount_paid', 
        'payment_type' 
    ];
public function company()
{
    return $this->belongsTo(Company::class, 'company_id');
}

public function plan()
{
    return $this->belongsTo(Plan::class, 'plan_id');
}
   
}
