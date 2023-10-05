<?php

namespace App\Http\Livewire;

use App\Models\DataPenduduk;
use Livewire\Component;

class DataDesaPenduduk extends Component
{

    public $nama, $nik;
    public $selected_penduduk_id;
    public $updatePendudukMode =  false;

    protected $listeners = [
        'resetModalForm',
        'deletePendudukAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->nama = null;
        $this->nik = null;
        $this->updatePendudukMode = false;
        // $this->dispatchBrowserEvent('fastreload');

    }



    public function addPenduduk()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required|numeric|unique:data_penduduks,nik',
        ],[
            'nama.required' => 'Nama Penduduk harus diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.required' => ':attribute harus diisi',
            'nik.numeric' => ':attribute hanya boleh angka',
            
        ]);

        $penduduk = new DataPenduduk();
        $penduduk->nama = $this->nama;
        $penduduk->nik = $this->nik;
        $saved = $penduduk->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Data Penduduk baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hidePendudukModal');
            $this->dispatchBrowserEvent('2sreload');
            $this->nama = null;
            $this->nik = null;
        }else{
            $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
        }
    }


    public function editPenduduk($id){
        $penduduk = DataPenduduk::findOrFail($id);
        $this->selected_penduduk_id = $penduduk->id;
        $this->nama = $penduduk->nama;
        $this->nik = $penduduk->nik;
        $this->updatePendudukMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showPendudukModal');
    }


    public function updatePenduduk(){
        if($this->selected_penduduk_id){
            $this->validate([
                'nama' => 'required',
                'nik' => 'required|numeric|unique:data_penduduks,nik,'.$this->selected_penduduk_id,
            ],[
                'nama.required' => 'Nama Penduduk harus diisi',
                'nik.unique' => 'NIK sudah terdaftar',
                'nik.required' => ':attribute harus diisi',
                'nik.numeric' => ':attribute hanya boleh angka',
                
            ]);

            $penduduk = DataPenduduk::findOrFail($this->selected_penduduk_id);
            $penduduk->nama = $this->nama;
            $penduduk->nik = $this->nik;
            $updated = $penduduk->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Data Penduduk telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hidePendudukModal');
                $this->dispatchBrowserEvent('2sreload');

                $this->nama = null;
                $this->nik = null;
                $this->updatePendudukMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deletePenduduk($id){
        $penduduk = DataPenduduk::find($id);
        $this->dispatchBrowserEvent('deletePenduduk',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus Data atas nama <b>'.$penduduk->nama.'</b>',
            'id' => $id
        ]);
    }

    public function deletePendudukAction($id){
        $penduduk = DataPenduduk::where('id', $id)->first();

        $penduduk->delete();
        $this->dispatchBrowserEvent('info',['message' => 'Data Penduduk telah berhasil dihapus.']);
        $this->dispatchBrowserEvent('2sreload');

    }



    public function render()
    {
        return view('livewire.data-desa-penduduk');
    }
}
