<?php

use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;


/**
 * DATE FORMAT eg: January 12, 2023
 */
// if(!function_exists('date_formatter')){
//     function date_formatter($date){
//         return Carbon::createFromFormat('Y-m-d H:i:s', $date)->isoFormat('LL');
//     }
// }
/**
 * DATE FORMAT eg: 12 January, 2023
 */
if (!function_exists('date_formatter')) {
    function date_formatter($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->isoFormat('DD MMMM YYYY');
    }
}


/**
 * STRIP WORDS
 */
// if(!function_exists('words')){
//     function words($value, $words = 15, $end="..."){
//         return Str::words(strip_tags($value), $words, $end);
//     }
// }


/**
 * Check if user ins online/have an internet connection
 */
if(!function_exists('isOnline')){
    function isOnline($site = "https://youtube.com"){
        if(@fopen($site,'r')){
            return true;
        }else{
            return false;
        }
    }
}


/**
 * DISPLAY HOME MAIN LATEST POST
 */
if(!function_exists('single_latest_post')){
    function single_latest_post(){
        return Post::with('author')
                    ->with('subcategory')
                    ->limit(1)
                    ->orderBy('created_at','desc')
                    ->first();
    }
}

/**
 * DISPLAY HOME MAIN 3 LATEST POST
 */
if(!function_exists('after_single_latest_post')){
    function after_single_latest_post(){
        return Post::with('author')
                    ->with('subcategory')
                    ->skip(1)
                    ->limit(3)
                    ->orderBy('created_at','desc')
                    ->get();
    }
}

/**
 * DISPLAY 6 LATEST POST ON HOME PAGE
 */
if(!function_exists('latest_6_post')){
    function latest_6_post(){
        return Post::with('author')
                    ->with('subcategory')
                    ->skip(4) // Skip the first four records
                    ->limit(6)
                    ->orderBy('created_at', 'desc')
                    ->get();
    

    }
}

/**
 * RANDOM RECOMMENDED POSTS
 */
IF(!function_exists('recommended_posts')){
    function recommended_posts(){
        return Post::with('author')
                    ->with('subcategory')
                    ->limit(5)
                    ->inRandomOrder()
                    ->get();
    }
}

/**
 * POSTS WITH NUMBER OF POSTS
 */
if(!function_exists('categories')){
    function categories(){
        return SubCategory::whereHas('posts')
                            ->with('posts')
                            ->orderBy('subcategory_name','asc')
                            ->get();
    }
}

?>