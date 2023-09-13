<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AuthorAddPost extends Component
{
    use WithFileUploads;

    public $post_title, $post_content, $post_category, $feature_image;

    public function resetAddPostPage(){
        $this->post_title = '';
        $this->post_content = '';
        $this->post_category = null;
        $this->feature_image = null;
    }

    public function addPost(){
        $this->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_category' => 'required|exists:sub_categories,id',
            'feature_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ],[
            'post_title.required' => 'Judul tidak boleh kosong',
            'post_content.required' => 'Content tidak boleh kosong',
            'post_category.required' => 'Kategori harus dipilih',
            'post_category.exists' => 'Kategori tidak terdaftar',
            'feature_image.required' => 'Gambar tidak boleh kosong',
            'feature_image.image' => 'Format gambar tidak benar',
            'feature_image.mimes' => 'Hanya boleh tipe file jpeg,jpg,png',
            'feature_image.max' => 'Maksimal 2mb',
        ]);

        if ($this->feature_image) { // Check if an image was uploaded
            $path = "images/post_images/";
            $file = $this->feature_image;
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '_' . $filename;
            // $upload = Storage::disk('public')->put($path . $new_filename, (string)file_get_contents($file));
            $upload = $this->feature_image->storeAs('public',$path . $new_filename);
    
            if ($upload) {
                $post = new Post();
                $post->author_id = auth()->id();
                $post->category_id = $this->post_category;
                $post->post_title = $this->post_title;
                $post->post_slug = Str::slug($this->post_title);
                $post->post_content = $this->post_content;
                $post->featured_image = $new_filename;
                $saved = $post->save();
    
                if ($saved) {
                    $this->dispatchBrowserEvent('success', ['message' => 'Berhasil menambahkan post']);
                    $this->resetAddPostPage();
                } else {
                    $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong ins saving post data']);
                }
            } else {
                $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong for uploading featured image']);
            }
        } else {
            $this->dispatchBrowserEvent('error', ['message' => 'Gambar tidak boleh kosong']);
        }

    }

    public function render()
    {
        return view('livewire.author-add-post');
    }

}
