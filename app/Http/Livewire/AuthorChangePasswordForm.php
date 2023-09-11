<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorChangePasswordForm extends Component
{
    public $current_password, $new_password, $confirm_new_password;

    public function changePassword()
    {
       $this->validate([
            'current_password' => [
                'required', function($attribute, $value, $fail){
                    if(!Hash::check($value, User::find(auth('web')->id())->password)){
                        return $fail(__('Kata sandi sekarang salah'));
                    }
                }
            ],
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'same:new_password'
        ],[
            'current_password.required' => 'Masukkan kata sandi saat ini',
            'new_password.required' => 'Masukkan kata sandi baru',
            'new_password.min' => 'Kata sandi baru minimal 6 karakter',
            'confirm_new_password.same' => 'Kata sandi konfirmasi harus sama dengan kata sandi baru', 
        ]);

        $query = User::find(auth('web')->id())->update([
            'password' => Hash::make($this->new_password)
        ]);

        if($query){
            $this->dispatchBrowserEvent('success', ['message' => 'Kata sandi anda berhasil diperbarui.']);
            $this->current_password = $this->new_password = $this->confirm_new_password = null;
        }else{
            $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong.']);
        }


    }

    public function render()
    {
        return view('livewire.author-change-password-form');
    }
}
