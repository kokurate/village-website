<?php

namespace App\Http\Livewire;

use App\Models\WilayahAdministratif;
use Livewire\Component;

class DataDesaWilayah extends Component
{
    public $dusun, $kk , $laki_laki, $perempuan;
    public $selected_wilayah_id;
    public $updateWilayahMode =  false;

    protected $listeners = [
        'resetModalForm',
        'deleteWilayahAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->dusun = null;
        $this->kk = null;
        $this->laki_laki = null;
        $this->perempuan = null;
        $this->updateWilayahMode = false;
    }

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


    public function editWilayah($id){
        $data_wilayah = WilayahAdministratif::findOrFail($id);
        $this->selected_wilayah_id = $data_wilayah->id;
        $this->dusun = $data_wilayah->dusun;
        $this->kk = $data_wilayah->kk;
        $this->laki_laki = $data_wilayah->laki_laki;
        $this->perempuan = $data_wilayah->perempuan;
        $this->updateWilayahMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showWilayahModal');
    }


    public function updateWilayah(){
        if($this->selected_wilayah_id){
            $this->validate([
                'dusun' => 'required|unique:wilayah_administratifs,dusun,'.$this->selected_wilayah_id,
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

            $data_wilayah = WilayahAdministratif::findOrFail($this->selected_wilayah_id);
            $data_wilayah->data_desa_id = 1;
            $data_wilayah->dusun = $this->dusun;
            $data_wilayah->kk = $this->kk;
            $data_wilayah->laki_laki = $this->laki_laki;
            $data_wilayah->perempuan = $this->perempuan;
            $updated = $data_wilayah->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Data Wilayah Administratif telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hideWilayahModal');
                $this->dusun = null;
                $this->kk = null;
                $this->laki_laki = null;
                $this->perempuan = null;
                $this->updateWilayahMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deleteWilayah($id){
        $data_wilayah = WilayahAdministratif::find($id);
        $this->dispatchBrowserEvent('deleteWilayah',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus dusun <b>'.$data_wilayah->dusun.'</b>',
            'id' => $id
        ]);
    }

    public function deleteWilayahAction($id){
        $data_wilayah = WilayahAdministratif::where('id', $id)->first();

        $data_wilayah->delete();
        $this->dispatchBrowserEvent('info',['message' => 'Data Wilayah Administratif telah berhasil dihapus.']);

    }




    public function render()
    {
        return view('livewire.data-desa-wilayah',[
           'data_wilayah' => WilayahAdministratif::orderBy('created_at','DESC')->get()
        ]);
    }

    
}
