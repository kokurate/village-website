<?php

namespace App\Http\Livewire;

use App\Models\Pekerjaan;
use Livewire\Component;

class DataDesaPekerjaan extends Component
{
    public $nama, $jumlah;
    public $selected_pekerjaan_id;
    public $updatePekerjaanMode =  false;

    protected $listeners = [
        'resetModalForm',
        'deletePekerjaanAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->nama = null;
        $this->jumlah = null;
        $this->updatePekerjaanMode = false;
    }



    public function addPekerjaan()
    {
        $this->validate([
            'nama' => 'required|unique:pekerjaans,nama',
            'jumlah' => 'required|numeric',
        ],[
            'nama.required' => 'Nama mata pencaharian harus diisi',
            'nama.unique' => 'Nama mata pencaharian sudah terdaftar',
            'jumlah.required' => ':attribute harus diisi',
            'jumlah.numeric' => ':attribute hanya boleh angka',
            
        ]);

        $pekerjaan = new Pekerjaan();
        $pekerjaan->data_desa_id = 3;
        $pekerjaan->nama = $this->nama;
        $pekerjaan->jumlah = $this->jumlah;
        $saved = $pekerjaan->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Data Mata Pencaharian baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hidePekerjaanModal');
            $this->nama = null;
            $this->jumlah = null;
        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }


    public function editPekerjaan($id){
        $pekerjaan = Pekerjaan::findOrFail($id);
        $this->selected_pekerjaan_id = $pekerjaan->id;
        $this->nama = $pekerjaan->nama;
        $this->jumlah = $pekerjaan->jumlah;
        $this->updatePekerjaanMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showPekerjaanModal');
    }


    public function updatePekerjaan(){
        if($this->selected_pekerjaan_id){
            $this->validate([
                'nama' => 'required|unique:pekerjaans,nama,'.$this->selected_pekerjaan_id,
                'jumlah' => 'required|numeric',
            ],[
                'nama.required' => 'Nama mata pencaharian harus diisi',
                'nama.unique' => 'Nama mata pencaharian sudah terdaftar',
                'jumlah.required' => ':attribute harus diisi',
                'jumlah.numeric' => ':attribute hanya boleh angka',
                
            ]);

            $pekerjaan = Pekerjaan::findOrFail($this->selected_pekerjaan_id);
            $pekerjaan->data_desa_id = 3;
            $pekerjaan->nama = $this->nama;
            $pekerjaan->jumlah = $this->jumlah;
            $updated = $pekerjaan->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Data Pekerjaan telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hidePekerjaanModal');
                $this->nama = null;
                $this->jumlah = null;
                $this->updatePekerjaanMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deletePekerjaan($id){
        $pekerjaan = Pekerjaan::find($id);
        $this->dispatchBrowserEvent('deletePekerjaan',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus Mata Pencaharian <b>'.$pekerjaan->nama.'</b>',
            'id' => $id
        ]);
    }

    public function deletePekerjaanAction($id){
        $data_wilayah = Pekerjaan::where('id', $id)->first();

        $data_wilayah->delete();
        $this->dispatchBrowserEvent('info',['message' => 'Data Pekerjaan telah berhasil dihapus.']);

    }


    public function render()
    {
        return view('livewire.data-desa-pekerjaan',[
            'data_pekerjaan' => Pekerjaan::orderBy('created_at','DESC')->get()
        ]);
    }
}
