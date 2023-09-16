<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_data',
    ];

    public function wilayah(){
        return $this->hasMany(WilayahAdministratif::class,'data_desa_id','id');
    }

    public function tingkatpendidikan(){
        return $this->hasMany(TingkatPendidikan::class,'data_desa_id','id');
    }

}
