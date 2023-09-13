<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AuthorAddPost extends Component
{
    use WithFileUploads;

    public $post_title, $post_content, $post_category, $feature_image;

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

    }

    public function render()
    {
        return view('livewire.author-add-post');
    }

}
