<?php

namespace App\Http\Livewire;

use App\Models\Agama;
use Livewire\Component;

class DataDesaAgama extends Component
{
    public $nama, $jumlah;
    public $selected_agama_id;
    public $updateAgamaMode = false;
    


    protected $listeners = [
        'resetModalForm',
        'deleteAgamaAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->nama = null;
        $this->jumlah = null;
        $this->updateAgamaMode = false;
    }



    public function addAgama()
    {
        $this->validate([
            'nama' => 'required|unique:agamas,nama',
            'jumlah' => 'required|numeric',
        ],[
            'umur.required' => 'Nama agama harus diisi',
            'umur.unique' => 'Agama sudah terdaftar',
            'jumlah.required' => ':attribute harus diisi',
            'jumlah.numeric' => ':attribute hanya boleh angka',
            
        ]);

        $data = new Agama();
        $data->data_desa_id = 6;
        $data->nama = $this->nama;
        $data->jumlah = $this->jumlah;
        $saved = $data->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Data Agama baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hideAgamaModal');
            $this->nama = null;
            $this->jumlah = null;
        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }


    public function editAgama($id){
        $data = Agama::findOrFail($id);
        $this->selected_agama_id = $data->id;
        $this->nama = $data->nama;
        $this->jumlah = $data->jumlah;
        $this->updateAgamaMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showAgamaModal');
    }


    public function updateAgama(){
        if($this->selected_agama_id){
            $this->validate([
                'nama' => 'required|unique:agamas,nama,'.$this->selected_agama_id,
                'jumlah' => 'required|numeric',
            ],[
                'nama.required' => 'Nama agama harus diisi',
                'nama.unique' => 'Agama sudah terdaftar',
                'jumlah.required' => ':attribute harus diisi',
                'jumlah.numeric' => ':attribute hanya boleh angka',
                
            ]);

            $data = Agama::findOrFail($this->selected_agama_id);
            $data->data_desa_id = 6;
            $data->nama = $this->nama;
            $data->jumlah = $this->jumlah;
            $updated = $data->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Data Agama telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hideAgamaModal');
                $this->nama = null;
                $this->jumlah = null;
                $this->updateAgamaMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deleteAgama($id){
        $data = Agama::find($id);
        $this->dispatchBrowserEvent('deleteAgama',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus data <b>'.$data->nama.'</b>',
            'id' => $id
        ]);
    }

    public function deleteAgamaAction($id){
        $data_wilayah = Agama::where('id', $id)->first();

        $data_wilayah->delete();
        $this->dispatchBrowserEvent('info',['message' => 'Data Agama telah berhasil dihapus.']);

    }



    public function render()
    {
        return view('livewire.data-desa-agama',[
            'all' => Agama::orderBy('created_at','DESC')->get(),
        ]);
    }
}
