<?php

namespace App\Http\Livewire;

use App\Models\GolonganUmur;
use Livewire\Component;

class DataDesaGolonganUmur extends Component
{
    public $umur, $jumlah;
    public $selected_golongan_umur_id;
    public $updateGolonganUmurMode = false;
    


    protected $listeners = [
        'resetModalForm',
        'deleteGolonganUmurAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->umur = null;
        $this->jumlah = null;
        $this->updateGolonganUmurMode = false;
    }



    public function addGolonganUmur()
    {
        $this->validate([
            'umur' => 'required|unique:golongan_umurs,umur',
            'jumlah' => 'required|numeric',
        ],[
            'umur.required' => 'Umur harus diisi',
            'umur.unique' => 'Umur sudah terdaftar',
            'jumlah.required' => ':attribute harus diisi',
            'jumlah.numeric' => ':attribute hanya boleh angka',
            
        ]);

        $data = new GolonganUmur();
        $data->data_desa_id = 5;
        $data->umur = $this->umur;
        $data->jumlah = $this->jumlah;
        $saved = $data->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Data Golongan Umur baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hideGolonganUmurModal');
            $this->umur = null;
            $this->jumlah = null;
        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }


    public function editGolonganUmur($id){
        $data = GolonganUmur::findOrFail($id);
        $this->selected_golongan_umur_id = $data->id;
        $this->umur = $data->umur;
        $this->jumlah = $data->jumlah;
        $this->updateGolonganUmurMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showGolonganUmurModal');
    }


    public function updateGolonganUmur(){
        if($this->selected_golongan_umur_id){
            $this->validate([
                'umur' => 'required|unique:golongan_umurs,umur,'.$this->selected_golongan_umur_id,
                'jumlah' => 'required|numeric',
            ],[
                'umur.required' => 'Umur harus diisi',
                'umur.unique' => 'Umur sudah terdaftar',
                'jumlah.required' => ':attribute harus diisi',
                'jumlah.numeric' => ':attribute hanya boleh angka',
                
            ]);

            $data = GolonganUmur::findOrFail($this->selected_golongan_umur_id);
            $data->data_desa_id = 5;
            $data->umur = $this->umur;
            $data->jumlah = $this->jumlah;
            $updated = $data->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Golongan Umur telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hideGolonganUmurModal');
                $this->umur = null;
                $this->jumlah = null;
                $this->updateGolonganUmurMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deleteGolonganUmur($id){
        $data = GolonganUmur::find($id);
        $this->dispatchBrowserEvent('deleteGolonganUmur',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus data <b>'.$data->umur.'</b>',
            'id' => $id
        ]);
    }

    public function deleteGolonganUmurAction($id){
        $data_wilayah = GolonganUmur::where('id', $id)->first();

        $data_wilayah->delete();
        $this->dispatchBrowserEvent('info',['message' => 'Data Golongan Umur telah berhasil dihapus.']);

    }


    public function render()
    {
        return view('livewire.data-desa-golongan-umur',[
            'all' => GolonganUmur::orderBy('created_at','DESC')->get(),
        ]);
    }
}
