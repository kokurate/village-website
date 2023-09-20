<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginForm extends Component
{
    public $login_id, $password;
    public $returnUrl;
    public $show_password =  false;

    public function mount()
    {
        $this->returnUrl = request()->returnUrl;
    }

    public function show_password(){
        $this->show_password = !$this->show_password;
    }

    public function LoginHandler()
    {
        // dd($this->returnUrl);
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if($fieldType == 'email'){
            $this->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required'
            ],[
                'login_id.required' => 'Masukkan email atau username anda',
                'login_id.email' => 'Format email tidak benar',
                'login_id.exists' => 'Email tidak terdaftar',
                'password.required' => 'Masukkan password anda',
            ]);
        }else{
            $this->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required'
            ],[
                'login_id.required' => 'Masukkan email atau username anda',
                'login_id.exists' => 'Username tidak terdaftar',
                'password.required' => 'Masukkan password anda',
            ]);
        }


        $creds = array($fieldType => $this->login_id, 'password' => $this->password);

        if(Auth::guard('web')->attempt($creds)){
            $checkUser = User::where($fieldType, $this->login_id)->first();
            if($checkUser->blocked == 1){
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail', 'Akun anda diblokir, silahkan menghubungi admin');
            }else{
                // return redirect()->route('author.home');
                if($this->returnUrl != null){
                    return redirect()->to($this->returnUrl);
                }else{
                    return redirect()->route('author.home');
                }
            }
        }else{
            session()->flash('fail','Email/username atau password salah');
        }

        // Login using email only
        // $this->validate([
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|min:5'
        // ],[
        //     'email.required' => 'Masukkan email anda',
        //     'email.email' => 'Format email tidak benar',
        //     'email.exists' => 'Email belum terdaftar',
        //     'password.required' => 'Masukkan password anda',
        // ]);


        // $creds = array('email' => $this->email, 'password' => $this->password);

        //   if(Auth::guard('web')->attempt($creds)){
            
        //     $checkUser = User::where('email', $this->email)->first();
        //         if($checkUser->blocked == 1){
        //             Auth::guard('web')->logout();
        //             return redirect()->route('author.login')->with('fail','Akun anda diblokir');
        //         }else{
        //             return redirect()->route('author.home');
        //         }
    
        //   }else{
        //     session()->flash('fail', 'Email atau password salah');
        //   }

    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
