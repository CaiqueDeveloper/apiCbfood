<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalItems extends Model
{
    use HasFactory;
    protected $fillable = ['additional_id','name', 'description', 'price', 'code', 'status'];

}
