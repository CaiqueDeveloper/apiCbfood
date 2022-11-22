<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable = ['path'];

    public function imagebleMorph(){
        
        return $this->morphTo();
    }
    protected static function storageImages($model, $images){

        return $model->image()->createMany($images);
    }
}
