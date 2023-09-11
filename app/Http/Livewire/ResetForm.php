<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetForm extends Component
{
    public $email, $token, $new_password, $confirm_new_password;

    public function mount()
    {
        $this->email = request()->email;
        $this->token = request()->token;
    }

    public function ResetHandler()
    {
        $this->validate([
            'email' =>'required|email|exists:users,email',
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'same:new_password'
        ],[
            'email.required' => ':attribute tidak boleh kosong',
            'email.email' => 'Format :attribute tidak sesuai',
            'email.exists' => ':attribute tidak terdaftar',
            'new_password.required' => 'kata sandi baru tidak boleh kosong',
            'new_password.min' => 'Minimal 6 karakter',
            'confirm_new_password.same' => 'Konfirmasi kata sandi baru dan kata sandi baru harus cocok'
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $this->email,
            'token' => $this->token,
        ])->first();

        if(!$check_token){
            session()->flash('fail','Token tidak sesuai');
        }else{
            User::where('email', $this->email)->update([
                'password' => Hash::make($this->new_password),
            ]);
            DB::table('password_resets')->where([
                'email' => $this->email
            ])->delete();

            $success_token = Str::random(64);
            session()->flash('success','Kata sandi Anda telah berhasil diperbarui. Silakan masuk dengan email/username anda
                                        dan kata sandi baru anda');

            $this->redirectRoute('author.login',['tkn' => $success_token, 'UEmail' => $this->email]);
        }

    }

    public function render()
    {
        return view('livewire.reset-form');
    }
}
