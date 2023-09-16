<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganUmur extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_desa_id',
        'umur',
        'jumlah'
    ];

    public function golonganumur(){
        return $this->belongsTo(DataDesa::class,'data_desa_id','id');
    }


}
