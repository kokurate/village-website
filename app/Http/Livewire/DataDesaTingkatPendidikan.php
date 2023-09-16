<?php

namespace App\Http\Livewire;

use App\Models\TingkatPendidikan;
use Livewire\Component;

class DataDesaTingkatPendidikan extends Component
{
    public $tp, $jumlah ;
    public $selected_tingkat_pendidikan_id;
    public $updateTingkatPendidikanMode =  false;


    protected $listeners = [
        'resetModalForm',
        'deleteTingkatPendidikanAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->tp = null;
        $this->jumlah = null;
        $this->updateTingkatPendidikanMode = false;
    }

    public function addTingkatPendidikan()
    {
        $this->validate([
            'tp' => 'required|unique:tingkat_pendidikans,tingkat_pendidikan',
            'jumlah' => 'required|numeric',
        ],[
            'tp.required' => 'Tingkat Pendidikan harus diisi',
            'tp.unique' => 'Tingkat Pendidikan sudah terdaftar',
            'jumlah.required' => ':attribute harus diisi',
            'jumlah.numeric' => ':attribute hanya boleh angka',
            
        ]);

        $tingkat_pendidikan = new TingkatPendidikan();
        $tingkat_pendidikan->data_desa_id = 2;
        $tingkat_pendidikan->tingkat_pendidikan = $this->tp;
        $tingkat_pendidikan->jumlah = $this->jumlah;
        $saved =$tingkat_pendidikan->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Data Tingkat Pendidikan baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hideTingkatPendidikanModal');
            $this->tp = null;
            $this->jumlah = null;

        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }


    public function editTingkatPendidikan($id){
        $tingkat_pendidikan = TingkatPendidikan::findOrFail($id);
        $this->selected_tingkat_pendidikan_id = $tingkat_pendidikan->id;
        $this->tp = $tingkat_pendidikan->tingkat_pendidikan;
        $this->jumlah = $tingkat_pendidikan->jumlah;
        $this->updateTingkatPendidikanMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showTingkatPendidikanModal');
    }


    public function updateTingkatPendidikan(){
        if($this->selected_tingkat_pendidikan_id){
            $this->validate([
                'tp' => 'required|unique:tingkat_pendidikans,tingkat_pendidikan,'.$this->selected_tingkat_pendidikan_id,
                'jumlah' => 'required|numeric',
            ],[
                'tp.required' => 'Tingkat Pendidikan harus diisi',
                'tp.unique' => 'Tingkat Pendidikan sudah terdaftar',
                'jumlah.required' => ':attribute harus diisi',
                'jumlah.numeric' => ':attribute hanya boleh angka',
                
            ]);
    

            $tingkat_pendidikan = TingkatPendidikan::findOrFail($this->selected_tingkat_pendidikan_id);
            $tingkat_pendidikan->data_desa_id = 2;
            $tingkat_pendidikan->tingkat_pendidikan = $this->tp;
            $tingkat_pendidikan->jumlah = $this->jumlah;
            $updated = $tingkat_pendidikan->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Data Tingkat Pendidikan telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hideTingkatPendidikanModal');
                $this->tp = null;
                $this->jumlah = null;
                $this->updateTingkatPendidikanMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deleteTingkatPendidikan($id){
        $tingkat_pendidikan = TingkatPendidikan::find($id);
        $this->dispatchBrowserEvent('deleteTingkatPendidikan',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus Tingkat Pendidikan <b>'.$tingkat_pendidikan->tingkat_pendidikan.'</b>',
            'id' => $id
        ]);
    }

    public function deleteTingkatPendidikanAction($id){
        $data_wilayah = TingkatPendidikan::where('id', $id)->first();

        $data_wilayah->delete();
        $this->dispatchBrowserEvent('info',['message' => 'Data Tingkat Pendidikan telah berhasil dihapus.']);

    }


    public function render()
    {
        return view('livewire.data-desa-tingkat-pendidikan',[
            'all' => TingkatPendidikan::orderBy('created_at','DESC')->get()
        ]);
    }
}
