<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description', 'price', 'canPrice', 'hasVariations','status'];

    public function prduct_morph(){
        return $this->morphTo();
    }
    public function image(){   
        return $this->morphMany(Images::class, 'imagebleMorph');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function promotion(){
        return $this->hasMany(Promotion::class);
    }
    public function images(){
        return $this->hasMany(Images::class,'imagebleMorph_id');
    }
    public function additionalsProduct(){
        return $this->hasMany(AdditionalProduct::class, 'product_id');
    }
    public function variations(){
        return $this->hasMany(VariationProduct::class, 'product_id');
    }
}
