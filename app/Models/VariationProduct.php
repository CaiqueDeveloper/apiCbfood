<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationProduct extends Model
{
    use HasFactory;
    protected  $table = 'variation_product';
    protected $fillable = ['product_id', 'variationName', 'variationType', 'variationPrice'];

}
