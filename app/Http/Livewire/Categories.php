<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode =  false;


    public function addCategory()
    {
        $this->validate([
            'category_name' => 'required|unique:categories,category_name',
        ],[
            'category_name.required' => 'Nama Kategori harus diisi',
            'category_name.unique' => 'Nama Kategori Sudah Terdaftar',
        ]);

        $category = new Category();
        $category->category_name = $this->category_name;
        $saved = $category->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Menu baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->category_name = null;

        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }
    
    public function render()
    {
        return view('livewire.categories',[
            'categories' => Category::orderBy('ordering','ASC')->get(),
        ]);
    }
}
