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
            $this->dispatchBrowserEvent('success',['message' => 'Kategori baru telah berhasil ditambahkan.']);
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->category_name = null;

        }else{
            $this->dispatchBrowserEvent('error',['Something went wrong']);
        }
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        $this->selected_category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->updateCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showCategoriesModal');
    }
    

    public function updateCategory(){
        if($this->selected_category_id){
            $this->validate([
                'category_name' => 'required|unique:categories,category_name,'.$this->selected_category_id,
            ],[
                'category_name.required' => 'Nama Kategori harus diisi',
                'category_name.unique' => 'Nama Kategori Sudah Terdaftar',
            ]);

            $category = Category::findOrFail($this->selected_category_id);
            $category->category_name = $this->category_name;
            $updated = $category->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Kategori telah berhasil diperbarui']);
                $this->dispatchBrowserEvent('hideCategoriesModal');
                $this->category_name = null ;
                $this->updateCategoryMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function render()
    {
        return view('livewire.categories',[
            'categories' => Category::orderBy('ordering','ASC')->get(),
        ]);
    }
}
