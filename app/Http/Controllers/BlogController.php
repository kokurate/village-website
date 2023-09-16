<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;

class BlogController extends Controller
{
    public function categoryPosts (Request $request, $slug)
    {
        if(!$slug){
            return abort(404);
        }else{
            $subcategory = SubCategory::where('slug', $slug)->first();
            if(!$subcategory){
                return abort(404);
            }else{
                $posts = Post::where('category_id', $subcategory->id)
                               ->orderBy('created_at','desc')
                               ->paginate(10);

                $data = [
                    'pageTitle' => 'Category - '.$subcategory->subcategory_name,
                    'category' => $subcategory,
                    'posts' => $posts,
                ];

                return view('front.pages.category_posts', $data);
            }
        }
    }


    public function searchBlog(Request $request)
    {
        $query = request()->query('query');
        if($query && strlen($query) >= 2){
            $searchValues = preg_split('/\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);
            $posts = Post::query();

            $posts->where(function($q) use($searchValues){
                foreach($searchValues as $value){
                    $q->orWhere('post_title','LIKE',"%{$value}%");
                    $q->orWhere('post_content','LIKE',"%{$value}%");
                }
            });

            $posts = $posts->with('subcategory')
                           ->with('author')
                           ->orderBy('created_at','desc')
                           ->paginate(6);

            $data = [
                'pageTitle' => 'Hasil pencarian  :: ' .request()->query('query'),
                'posts' => $posts  
            ];

            return view('front.pages.search_posts', $data);

        }else{
            return abort(404); // we can also redirect back to search page with error message
        }
    }



}
