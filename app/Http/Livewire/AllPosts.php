<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AllPosts extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = null;
    public $author = null;
    public $category = null;
    public $orderBy ='desc';

    protected $listeners = [
        'deletePostAction'
    ];


    public function mount(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCategory(){
        $this->resetPage();
    }

    public function updatingAuthor(){
        $this->resetPage();
    }


    public function deletePost($id){
        $this->dispatchBrowserEvent('deletePost',[
            'title' => 'Apakah Kamu Yakin?',
            'html' => 'Kamu akan menghapus post ini.',
            'id' => $id,
        ]);
    }

    public function deletePostAction($id){
        // dd('Yes Delete Now');
        $post = Post::find($id);
        $path = "images/post_images/";
        $featured_image = $post->featured_image;

        if($featured_image != null  && Storage::disk('public')->exists($path.$featured_image)){

            // delete post featured image
            Storage::disk('public')->delete($path.$featured_image);
        }

        $delete_post = $post->delete();

        if($delete_post){
            $this->dispatchBrowserEvent('success', ['message' => 'Post telah berhasil dihapus']);
        }else{
            $this->dispatchBrowserEvent('error', ['message' => 'Something went wrong']);
        }
    }

    public function render()
    {
        return view('livewire.all-posts',[
            'posts' => auth()->user()->type == 1 ? 
                                // Post::paginate($this->perPage) : 
                                // Post::where('author_id', auth()->id())->paginate($this->perPage),     
                            Post::search(trim($this->search))
                                ->when($this->category, function($query){
                                    $query->where('category_id',$this->category);
                                })
                                ->when($this->author, function($query){
                                    $query->where('author_id', $this->author);
                                })
                                ->when($this->orderBy, function($query){
                                    $query->orderBy('id', $this->orderBy);
                                })
                                 ->paginate($this->perPage) : 
                            Post::search(trim($this->search))
                                ->when($this->category, function($query){
                                    $query->where('category_id',$this->category);
                                })
                                ->where('author_id', auth()->id())
                                ->when($this->orderBy, function($query){
                                    $query->orderBy('id', $this->orderBy);
                                })
                                ->where('author_id', auth()->id())
                                ->paginate($this->perPage),   
                            ]);
    }
}
