<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahAdministratif extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_desa_id',
        'dusun',
        'kk',
        'laki_laki',
        'perempuan',
    ];

    public function datadesa(){
        return $this->belongsTo(DataDesa::class,'data_desa_id','id');
    }
}
