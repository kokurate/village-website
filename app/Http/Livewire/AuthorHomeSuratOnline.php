<?php

namespace App\Http\Livewire;

use App\Models\SuratOnline;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthorHomeSuratOnline extends Component
{
    // public $status, $jenis_surat, $nama , $nik, $email, $pesan, $dibuat;
    public $detail ;

    public function detail($id){
        // dd($id);
        $data = SuratOnline::findOrFail($id);
        $this->detail = $data;
        $this->dispatchBrowserEvent('showDetailModal');
    }

    public function selesai($id){
        $user = SuratOnline::findOrFail($id);
 
        $email = $user->email;
        $nama = $user->nama;
        $selesai = 'selesai';

      
        $data =  array(
            'tanggal_pengajuan' => Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->isoFormat('DD MMMM YYYY'),
            'jenis_surat' => $user->jenis_surat,
            'nama' => $user->nama,
            'nik' => $user->nik,
        );

        // dd($data);
        $user->status = $selesai;
        // $user->email = null;
        $update = $user->save();
        // $update = $user->update([
        //     'status' => $selesai,
        //     'email' => null,
        // ]);


        if($update){

            Mail::send('surat-online-selesai-email-template', compact('data'), function($message) use ($email, $nama){
                $message->from('noreply@example.com', 'website_desa');
                $message->to($email,$nama)
                        ->subject('Surat Permohonan Selesai');
            });

            $this->dispatchBrowserEvent('success', ['message' => 'Permohonan Berhasil Diselesaikan']);
            $this->dispatchBrowserEvent('2sreload');

        }else{
            $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong.']);
        }


    }

    public function render()
    {
        return view('livewire.author-home-surat-online');
    }
}
