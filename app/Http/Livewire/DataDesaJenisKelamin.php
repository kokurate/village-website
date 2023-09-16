<?php

namespace App\Http\Livewire;

use App\Models\JenisKelamin;
use Livewire\Component;

class DataDesaJenisKelamin extends Component
{
    public $nama, $jumlah;
    public $selected_jenis_kelamin_id;
    public $updateJenisKelaminMode =  false;

    protected $listeners = [
        'resetModalForm',
        'deleteJenisKelaminAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->nama = null;
        $this->jumlah = null;
        $this->updateJenisKelaminMode = false;
    }


    public function addJenisKelamin()
    {
        $this->validate([
            'nama' => 'required|unique:jenis_kelamins,jenis_kelamin',
            'jumlah' => 'required|numeric',
        ],[
            'nama.required' => 'Nama Jenis Kelamin harus diisi',
            'nama.unique' => 'Jenis Kelamin sudah terdaftar',
            'jumlah.required' => ':attribute harus diisi',
            'jumlah.numeric' => ':attribute hanya boleh angka',
            
        ]);

        $data = new JenisKelamin();
        $data->data_desa_id = 4;
        $data->jenis_kelamin = $this->nama;
        $data->jumlah = $this->jumlah;
        $saved = $data->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Data Jenis Kelamin baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hideJenisKelaminModal');
            $this->nama = null;
            $this->jumlah = null;
        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }


    public function editJenisKelamin($id){
        $data = JenisKelamin::findOrFail($id);
        $this->selected_jenis_kelamin_id = $data->id;
        $this->nama = $data->jenis_kelamin;
        $this->jumlah = $data->jumlah;
        $this->updateJenisKelaminMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showJenisKelaminModal');
    }


    public function updateJenisKelamin(){
        if($this->selected_jenis_kelamin_id){
            $this->validate([
                'nama' => 'required|unique:jenis_kelamins,jenis_kelamin,'.$this->selected_jenis_kelamin_id,
                'jumlah' => 'required|numeric',
            ],[
                'nama.required' => 'Nama Jenis Kelamin harus diisi,',
                'nama.unique' => 'Jenis Kelamin sudah terdaftar',
                'jumlah.required' => ':attribute harus diisi',
                'jumlah.numeric' => ':attribute hanya boleh angka',
                
            ]);
        


            $data = JenisKelamin::findOrFail($this->selected_jenis_kelamin_id);
            $data->data_desa_id = 4;
            $data->jenis_kelamin = $this->nama;
            $data->jumlah = $this->jumlah;
            $updated = $data->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Data Jenis Kelamin telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hideJenisKelaminModal');
                $this->nama = null;
                $this->jumlah = null;
                $this->updateJenisKelaminMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deleteJenisKelamin($id){
        $data = JenisKelamin::find($id);
        $this->dispatchBrowserEvent('deleteJenisKelamin',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus jenis kelamin <b>'.$data->jenis_kelamin.'</b>',
            'id' => $id
        ]);
    }

    public function deleteJenisKelaminAction($id){
        $data = JenisKelamin::where('id', $id)->first();

        $data->delete();
        $this->dispatchBrowserEvent('info',['message' => 'Data Jenis Kelamin telah berhasil dihapus.']);

    }





    public function render()
    {
        return view('livewire.data-desa-jenis-kelamin',[
            'all' => JenisKelamin::orderBy('created_at','DESC')->get()
        ]);
    }
}
