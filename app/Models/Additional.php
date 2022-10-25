<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Additional extends Model
{
    use HasFactory;
    protected $fillable  = ['name'];

    public function aadditional_morph(){
        
        return $this->morphTo();
    }
    
}
