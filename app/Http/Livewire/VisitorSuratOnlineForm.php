<?php

namespace App\Http\Livewire;

use App\Models\DataPenduduk;
use App\Models\SuratOnline;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class VisitorSuratOnlineForm extends Component
{
    public $nama, $nik, $jenis_surat, $email, $pesan, $status;

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

        // Check if "nik" exists in DataPenduduk
       $dataPenduduk = DataPenduduk::where('nik', $this->nik)->first();
     
        //    dd($dataPenduduk);

       if ($dataPenduduk){

            $data = new SuratOnline();
            $data->status = 'konfirmasi';
            $data->nama = $this->nama;
            $data->nik = $dataPenduduk->id;
            $data->email = $this->email;
            $data->jenis_surat = $this->jenis_surat;
            $data->pesan = $this->pesan;
            $data->token = base64_encode(Str::random(64));
            $saved = $data->save();


           
            $data_email =  array(
                'jenis_surat' => $data->jenis_surat,
                'nama' => $data->nama,
                'nik' => $dataPenduduk->nik,
                'token' => $data->token,
            );


        
            $email = $data->email;
            $nama = $data->nama;

            if($saved){

                Mail::send('konfirmasi-surat-online-email-template', compact('data_email'), function($message) use ($email, $nama){
                    $message->from('noreply@desatoruakat.com', 'website_desa_toruakat');
                    $message->to($email,$nama)
                            ->subject('Konfirmasi Permohonan Surat Online');
                });



                $this->dispatchBrowserEvent('success',['message' => 'Permohonan Berhasil Dibuat. Silahkan melakukan konfirmasi data melalui email']);
                session()->flash('success','Permohonan Berhasil Dibuat. Silahkan melakukan konfirmasi data melalui email');
                $this->status = null;
                $this->nama = null;
                $this->nik = null;
                $this->email = null;
                $this->jenis_surat = null;
                $this->pesan = null;
                // $this->dispatchBrowserEvent('2sreload');
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
                session()->flash('error','Ada yang salah saat menyimpan data surat');

            }

        }else{
            $this->dispatchBrowserEvent('error',['message' => 'NIK Tidak Terdaftar']);
            session()->flash('error','NIK Tidak Terdaftar');
        }

    }

    public function render()
    {
        return view('livewire.visitor-surat-online-form');
    }
}
