<?php

namespace App\Http\Livewire;

use App\Models\Aparatur;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class AuthorAparaturDesa extends Component
{

    public $nama, $jabatan;

    public function AddAparatur(){
        $this->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ],[
            'nama.required' => ':attribute harus diisi',
            'jabatan.required' => ':attribute harus diisi',
        ]);

        $aparatur = new Aparatur();
        $aparatur->nama = $this->nama;
        $aparatur->jabatan = $this->jabatan;
        $saved = $aparatur->save();

        if($saved){
            session()->flash('success','Aparatur berhasil ditambahkan.');
            $this->dispatchBrowserEvent('success', ['message' => 'Aparatur berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('2sreload');
        }else{
            $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong.']);

        }
    

    }

    protected $listeners = [
        'deleteAparaturAction',
    ];


    public function deleteAparatur($id){
        $data = Aparatur::find($id);
        $this->dispatchBrowserEvent('deleteAparatur',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus data <b>'.$data->nama.'</b>',
            'id' => $id
        ]);
    }

    public function deleteAparaturAction($id){
        $aparatur = Aparatur::where('id', $id)->first();

        $path = 'back/dist/img/aparatur/';
        $old_picture = $aparatur->getAttributes()['image'];
        $file_path = $path.$old_picture;

        if($old_picture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
        }


        $aparatur->delete();
        session()->flash('success','Aparatur Desa telah berhasil dihapus.');
        $this->dispatchBrowserEvent('info',['message' => 'Aparatur Desa telah berhasil dihapus.']);
        // $this->dispatchBrowserEvent('2sreload');

    }

    public function render()
    {
        return view('livewire.author-aparatur-desa');
    }
}
