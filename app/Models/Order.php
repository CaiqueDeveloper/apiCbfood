<?php

namespace App\Models;
use DatePeriod;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'orders';
    protected $fillable = ['company_id','user_id','day','address_id', 'payment_method', 'delivery_price', 'price_total', 'thing','pickUpOnTheSpot', 'status'];

    public function orderProduct(){
       
        return $this->hasMany(OrderProduct::class, 'orders_id');
    }
    public function orderUser(){
       
        return $this->hasMany(User::class,'id', 'user_id');
    }
    public function orderAddress(){
        return $this->belongsTo(Address::class,'address_id', 'addres_morph_id');
    }
    public function orderCompany(){
       
        return $this->hasMany(User::class,'id', 'company_id');
    }
}
