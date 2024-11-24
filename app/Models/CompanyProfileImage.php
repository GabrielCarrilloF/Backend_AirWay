<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfileImage extends Model

{

protected $table = 'company_profile_images';

    protected $fillable = [
        'id',
        'company_id', 
        'image_url'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
