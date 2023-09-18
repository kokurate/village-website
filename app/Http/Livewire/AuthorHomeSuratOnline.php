<?php

namespace App\Http\Livewire;

use App\Models\SuratOnline;
use Livewire\Component;

class AuthorHomeSuratOnline extends Component
{
    // public $status, $jenis_surat, $nama , $nik, $email, $pesan, $dibuat;
    public $detail ;

    public function mount(){
        // $this->status = $this->status;
        // $this->jenis_surat = $this->jenis_surat;
        // $this->nama = $this->nama;
        // $this->nik = $this->nik;
        // $this->email = $this->email;
        // $this->pesan = $this->pesan;
        // $this->dibuat = $this->dibuat;

    }

    public function detail($id){
        // dd($id);
        $data = SuratOnline::findOrFail($id);
        $this->detail = $data;
        $this->dispatchBrowserEvent('showDetailModal');
    }

    public function render()
    {
        return view('livewire.author-home-surat-online');
    }
}
