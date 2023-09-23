<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode =  false;

    public $subcategory_name;
    public $parent_category = 0;
    public $selected_subcategory_id;
    public $updateSubCategoryMode = false;

    protected $listeners = [
        'resetModalForm',
        'deleteCategoryAction',
        'deleteSubCategoryAction',
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->category_name = null;
        $this->subcategory_name = null;
        $this->parent_category = null;
        $this->updateCategoryMode = false;
        $this->updateSubCategoryMode = false;
    }
    

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

    public function addSubCategory(){
        $this->validate([
            'parent_category' => 'required',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name'
        ],[
            'parent_category.required' => 'Parent Kategori harus dipilih',
            'subcategory_name.required' => 'Nama Subkategori harus diisi',
            'subcategory_name.unique' => 'Nama Subkategori sudah terdaftar',
        ]);

        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $this->subcategory_name;
        $subcategory->slug = Str::slug($this->subcategory_name);
        $subcategory->parent_category = $this->parent_category;
        $saved = $subcategory->save();

        if($saved){
            $this->dispatchBrowserEvent('success',['message' => 'Subkategori baru telah berhasil ditambahkan']);
            $this->dispatchBrowserEvent('hideSubCategoriesModal');
            $this->parent_category = null;
            $this->subcategory_name = null;
        }else{
            $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
        }

    }


    public function editSubCategory($id){
        $subcategory = SubCategory::findOrFail($id);
        $this->selected_subcategory_id = $subcategory->id;
        $this->parent_category = $subcategory->parent_category;
        $this->subcategory_name = $subcategory->subcategory_name;
        $this->updateSubCategoryMode = true;
        $this->dispatchBrowserEvent('showSubCategoriesModal');
        $this->resetErrorBag();
    }


    public function updateSubCategory(){
        if($this->selected_subcategory_id){
            $this->validate([
                'parent_category' => 'required',
                'subcategory_name' => 'required|unique:sub_categories,subcategory_name,'.$this->selected_subcategory_id,
            ],[
                'parent_category.required' => 'Parent Kategori harus dipilih',
                'subcategory_name.required' => 'Nama Subkategori harus diisi',
                'subcategory_name.unique' => 'Nama Subkategori sudah terdaftar',
            ]);

            $subcategory = SubCategory::findOrFail($this->selected_subcategory_id);
            $subcategory->subcategory_name = $this->subcategory_name;
            $subcategory->slug = Str::slug($this->subcategory_name);
            $subcategory->parent_category = $this->parent_category;
            $updated =  $subcategory->save();

            if($updated){
                $this->dispatchBrowserEvent('success',['message' => 'Subkategori telah berhasil diperbarui.']);
                $this->dispatchBrowserEvent('hideSubCategoriesModal');
                $this->updateSubCategoryMode = false;
            }else{
                $this->dispatchBrowserEvent('error',['message' => 'Something went wrong']);
            }
        }
    }


    public function deleteCategory($id){
        $category = Category::find($id);
        $this->dispatchBrowserEvent('deleteCategory',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus kategori <b>'.$category->category_name.'</b>',
            'id' => $id
        ]);
    }

    public function deleteCategoryAction($id){
        $category = Category::where('id', $id)->first();
        $subcategories = SubCategory::where('parent_category', $category->id)->whereHas('posts')->with('posts')->get();

        if(!empty($subcategories) && count($subcategories) > 0){
            $totalPosts = 0;
            foreach($subcategories as $subcat){
                $totalPosts += Post::where('category_id', $subcat->id)->get()->count();
            }    
            $this->dispatchBrowserEvent('error',['message' => 'Kategori ini tidak dapat dihapus karena memiliki ('.$totalPosts.') posting terkait.']);
        }else{
            SubCategory::where('parent_category', $category->id)->delete();
            $category->delete();
            $this->dispatchBrowserEvent('info',['message' => 'Kategori telah berhasil dihapus.']);

        }
    }


    public function deleteSubCategory($id){
        $subcategory = SubCategory::find($id);
        $this->dispatchBrowserEvent('deleteSubCategory',[
            'title' => 'Apakah Kamu Yakin ?',
            'html' => 'Kamu akan menghapus subkategori <b>'.$subcategory->subcategory_name.'</b>',
            'id' => $id
        ]);
    }

    public function deleteSubCategoryAction($id){
        // dd('yes delete now');
        $subcategory = SubCategory::where('id',$id)->first();
        $posts = Post::where('category_id', $subcategory->id)->get()->toArray();

        if(!empty($posts) && count($posts) > 0){
            $this->dispatchBrowserEvent('error',['message' => 'Subkategori ini tidak dapat dihapus karena memiliki  ('.count($posts).') posting terkait.']);

        }else{
            $subcategory->delete();
            $this->dispatchBrowserEvent('info',['message' => 'Subkategori telah berhasil dihapus.']);

        }
    }

    public function render()
    {
        return view('livewire.categories',[
            'categories' => Category::orderBy('ordering','ASC')->get(),
            'subcategories' => SubCategory::orderBy('ordering','asc')->get(),
        ]);
    }
}
