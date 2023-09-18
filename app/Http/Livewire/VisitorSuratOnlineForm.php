<?php

namespace App\Http\Livewire;

use App\Models\SuratOnline;
use Livewire\Component;

class VisitorSuratOnlineForm extends Component
{
    public $nama, $nik, $jenis_surat, $email, $pesan;

    public function addPermohonan(){
        $this->validate([
            'nama' => 'required',
            'nik' => 'required|numeric',
            'email' => 'required|email',
            'jenis_surat' => 'required|exists:jenis_surats,nama_surat',
            'pesan' => 'required',
        ],[
            'nama.required' => ':attribute harus diisi',
            'nik.required' => ':attribute harus diisi',
            'nik.numeric' => ':attribute harus angka',
            'email.required' => ':attribute harus diisi',
            'email.required' => 'format :attribute tidak valid',
            'jenis_surat.required' => 'Jenis surat harus dipilih',
            'jenis_surat.exists' => 'Jenis surat tidak terdaftar',
            'pesan.required' => ':attribute harus diisi',
        ]);

        $data = new SuratOnline();
        $data->status = 'masuk';
        $data->nama = $this->nama;
        $data->nik = $this->nik;
        $data->email = $this->email;
        $data->jenis_surat = $this->jenis_surat;
        $data->pesan = $this->pesan;
        $saved = $data->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Permohonan Berhasil Diajukan']);
            $this->dispatchBrowserEvent('2sreload');
        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }

    }

    public function render()
    {
        return view('livewire.visitor-surat-online-form');
    }
}
