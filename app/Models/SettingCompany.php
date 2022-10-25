<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingCompany extends Model
{
    use HasFactory;
    protected $table = 'setting_company';
    protected $fillable = ['company_id','slug_url','primaryColor','secondColor','hasDelivery', 'hasOpeneed', 'deliveryPrice', 'limit_send_delivery'];

    public function image(){   
        return $this->morphMany(Images::class, 'imagebleMorph');
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
