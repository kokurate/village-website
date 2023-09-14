<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;
    public $perPage = 2;

    public function render()
    {
        return view('livewire.all-posts',[
            'posts' => auth()->user()->type == 1 ? 
                                Post::paginate($this->perPage) : 
                                Post::where('author_id', auth()->id())->paginate($this->perPage),        ]);
    }
}
