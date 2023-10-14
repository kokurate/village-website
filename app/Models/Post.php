<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
   
    protected $fillable = [
        'author_id',
        'category_id',
        'post_title',
        'post_slug',
        'post_content',
        'featured_image',
    ];

    public function sluggable(): array
    {
        return [
            'post_slug' => [
                'source' => 'post_title'
            ]
        ];
    }

    public function scopeSearch($query,$term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('post_title','like', $term);
        });
    }

    
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'category_id','id');
    }

    public function author(){
        return $this->belongsTo(User::class,'author_id','id');
    }

    public function getFeaturedImageAttribute($value)
    {
        if($value){
            return asset('storage/images/post_images/'.$value);
        }else{
            return asset('storage/images/post_images/default.png');
        }
    }

    
    // When a post is being deleted, it will check if there is a featured_image, 
    // and if so, it will delete the associated image from storage.delete image if 
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function($post) {
    //         if ($post->featured_image) 
    //         {
    //             $path = "images/post_images/";
    //             if (Storage::disk('public')->exists($path . $post->getAttributes()['featured_image'])) 
    //             {
    //                 Storage::disk('public')->delete($path . $post->getAttributes()['featured_image']);
    //             }
    //         }
    //     });
    // }


}
