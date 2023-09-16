<?php

namespace App\Http\Livewire;

use App\Models\WilayahAdministratif;
use Livewire\Component;

class DataDesaWilayah extends Component
{
    public $dusun, $kk , $laki_laki, $perempuan;
    public $selected_category_id;
    public $updateWilayahMode =  false;



    public function addWilayah()
    {
        $this->validate([
            'dusun' => 'required|unique:wilayah_administratifs,dusun',
            'kk' => 'required|numeric',
            'laki_laki' => 'required|numeric',
            'perempuan' => 'required|numeric',
        ],[
            'dusun.required' => ':attribute harus diisi',
            'dusun.unique' => 'Dusun sudah terdaftar',
            'kk.required' => ':attribute harus diisi',
            'laki_laki.required' => ':attribute harus diisi',
            'perempuan.required' => ':attribute harus diisi',
            'perempuan.numeric' => ':attribute hanya boleh angka',
            'laki_laki.numeric' => ':attribute hanya boleh angka',
            'kk.numeric' => ':attribute hanya boleh angka',
            
        ]);

        $data_wilayah = new WilayahAdministratif();
        $data_wilayah->data_desa_id = 1;
        $data_wilayah->dusun = $this->dusun;
        $data_wilayah->kk = $this->kk;
        $data_wilayah->laki_laki = $this->laki_laki;
        $data_wilayah->perempuan = $this->perempuan;
        $saved = $data_wilayah->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Data Wilayah Administratif baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hideWilayahModal');
            $this->dusun = null;
            $this->kk = null;
            $this->laki_laki = null;
            $this->perempuan = null;

        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }



    public function render()
    {
        return view('livewire.data-desa-wilayah',[
           'data_wilayah' => WilayahAdministratif::orderBy('created_at','ASC')->get()
        ]);
    }

    
}
