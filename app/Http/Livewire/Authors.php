<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;

class Authors extends Component
{
    // public $name, $email, $username, $author_type, $direct_publisher;
    public $name, $email, $username, $author_type;

    protected $listeners = [
        'resetForms'
    ];


    public function resetForms()
    {
        // $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
        $this->name = $this->email = $this->username = $this->author_type =  null;
        $this->resetErrorBag();
    }
    
    public function addAuthor()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|min:6|max:20',
            'author_type' => 'required',
            // 'direct_publisher' => 'required',
        ],[
            'name.required' => 'Nama pengguna tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak sesuai',
            'email.unique' => 'Email sudah terdaftar',
            'username.required' => 'Nama pengguna tidak boleh kosong',
            'username.unique' => 'Nama pengguna sudah terdaftar',
            'username.min' => 'Nama pengguna minimal 6 karakter',
            'username.max' => 'Nama pengguna maksimal 20 karakter',
            'author_type.required' => 'Pilih tipe pengguna',
            // 'direct_publisher' => 'Specify author publication access'
        ]);

        if($this->isOnline()){

            $default_password = Random::generate(8);

            $author = new User();
            $author->name = $this->name;
            $author->email = $this->email;
            $author->username = $this->username;
            $author->password = Hash::make($default_password);
            $author->type = $this->author_type;
            // $author->direct_publish = $this->direct_publisher;
            $saved = $author->save();

            $data =  array(
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $default_password,
                'url' => route('author.profile'),
            );

            $author_email = $this->email;
            $author_name = $this->name;

            if($saved){

                Mail::send('new-author-email-template', $data, function($message) use ($author_email, $author_name){
                    $message->from('noreply@example.com', 'website_desa');
                    $message->to($author_email,$author_name)
                            ->subject('Pembuatan Akun');
                });

                // $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
                $this->name = $this->email = $this->username = $this->author_type =  null;
                $this->dispatchBrowserEvent('success', ['message' => 'Pengguna baru telah ditambahkan']);
                $this->dispatchBrowserEvent('hide_add_author_modal');


            }else{
                $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong.']);
            }

        }else{
            $this->dispatchBrowserEvent('error', ['message' => 'Anda sedang offline, periksa koneksi anda dan kirimkan formulir lagi nanti.']);
        }

    }

    public function isOnline($site = 'https://youtube.com')
    {
        if(@fopen($site,'r')){
            return true;
        }else{
            return false;
        }
    }

    public function render()
    {
        return view('livewire.authors',[
            'authors' => User::where('id', '!=', auth()->id())->get(),
        ]);
    }



}
