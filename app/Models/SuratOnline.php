<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratOnline extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat',
        'nama',
        'nik',
        'email',
        'pesan',
    ];


    public function data_penduduk(){
        return $this->belongsTo(DataPenduduk::class,'nik','id');
    }

}
