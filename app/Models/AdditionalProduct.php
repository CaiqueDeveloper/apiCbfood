<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalProduct extends Model
{
    use HasFactory;
    protected  $table = 'additional_product';
    protected $fillable = ['additional_id', 'product_id'];
    public $timestamps = false;

    public function additionals(){

        return $this->hasMany(Additional::class,'additional_morph_id', 'additional_id');
    }
    protected static function storageAdditionals($product, $additionals){
        
        return $product->additionalsProduct()->createMany($additionals);
    }
    
}
