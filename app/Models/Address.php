<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['states', 'zipe_code', 'city', 'distric', 'road', 'number', 'complement'];
    protected $table = 'address';
}
