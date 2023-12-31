<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class Authors extends Component
{
    use WithPagination;

    // public $name, $email, $username, $author_type, $direct_publisher;
    public $name, $email, $username, $author_type;
    public $selected_author_id;
    public $blocked = 0;

    public $search;
    public $perPage = 4;

    protected $listeners = [
        'resetForms',
        'deleteAuthorAction',
    ];

    public function mount(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

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
                $this->dispatchBrowserEvent('success', ['message' => 'Pengguna baru berhasil ditambahkan']);
                $this->dispatchBrowserEvent('hide_add_author_modal');


            }else{
                $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong.']);
            }

        }else{
            $this->dispatchBrowserEvent('error', ['message' => 'Anda sedang offline, periksa koneksi anda dan kirimkan formulir lagi nanti.']);
        }

    }


    public function editAuthor($author){
        // dd(['open edit author modal', $author]);
        $this->selected_author_id = $author['id'];
        $this->name = $author['name'];
        $this->email = $author['email'];
        $this->username = $author['username'];
        $this->author_type = $author['type'];
        // $this->direct_publisher = $author['direct_publish'];
        $this->blocked = $author['blocked'];

        $this->dispatchBrowserEvent('showEditAuthorModal');
    }

    public function updateAuthor(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->selected_author_id,
            'username' => 'required|min:6|max:20|unique:users,username,'.$this->selected_author_id,
        ],[
            'name.required' => 'Nama tidak boleh kosong', 
            'email.required' => 'Email tidak boleh kosong', 
            'email.email' => 'Format email tidak sesuai', 
            'email.unique' => 'Email sudah terdaftar',
            'username.required' => 'username tidak boleh kosong', 
            'username.min' => 'username minimal 6 karakter', 
            'username.max' => 'username maskimal 20 karakter', 
            'username.unique' => 'username sudah terdaftar', 
        ]);

        if($this->selected_author_id){
            $author = User::find($this->selected_author_id);
            $author->update([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'type' => $this->author_type,
                'blocked' => $this->blocked,
                // 'direct_publish' => $this->direct_publisher,
            ]);
        }


        $this->dispatchBrowserEvent('success', ['message' => 'Detail pengguna berhasil diperbarui']);
        $this->dispatchBrowserEvent('hide_edit_author_modal');

    }


    public function deleteAuthor($author){
        // dd(['Delete author', $author]);
        $this->dispatchBrowserEvent('deleteAuthor',[
            'title' => 'Apakah kamu yakin?',
            'html' => 'Kamu akan menghapus pengguna ini : <br><b>'.$author['name'].'<b>',
            'id' => $author['id'],
        ]);
    }

    public function deleteAuthorAction($id){
        // dd('yes delete');

        $author = User::find($id);
        $path = 'back/dist/img/authors/';
        $author_picture = $author->getAttributes()['picture'];
        $picture_full_path = $path.$author_picture;

        if($author_picture != null || File::exists(public_path($picture_full_path))){
            File::delete(public_path($picture_full_path));
        }

        $author->delete();
        $this->dispatchBrowserEvent('success', ['message' => 'Pengguna berhasil dihapus']);
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
            'authors' => User::search(trim($this->search))
                              ->where('id', '!=', auth()->id())
                              ->paginate($this->perPage),
            // 'authors' => User::where('id', '!=', auth()->id())->get(),
            'total' => User::all()->count(),
        ]);
    }



}
