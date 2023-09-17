<?php

namespace App\Http\Livewire;

use App\Models\Aparatur;
use Livewire\Component;

class AuthorAddAparaturForm extends Component
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

        $this->dispatchBrowserEvent('success', ['message' => 'Aparatur berhasil ditambahkan.']);
        $this->dispatchBrowserEvent('2sreload');
    

    }

    public function render()
    {
        return view('livewire.author-add-aparatur-form');
    }
}
