<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_desa_id',
        'jenis_kelamin',
        'jumlah',
    ];  

    public function datadesa(){
        return $this->belongsTo(DataDesa::class,'data_desa_id','id');
    }

}
