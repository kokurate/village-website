<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aparatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'image',
    ];

    public function getImageAttribute($value){
        if($value){
            return asset('back/dist/img/aparatur/'.$value);
        }else{
            return asset('back/dist/img/aparatur/default-img.png');
        }
    }
}
