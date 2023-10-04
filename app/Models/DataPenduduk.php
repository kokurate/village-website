<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
    ];

    public function surat_online(){
        return $this->hasMany(SuratOnline::class,'nik','id');
    }

}
