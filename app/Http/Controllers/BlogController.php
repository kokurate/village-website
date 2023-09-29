<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\GolonganUmur;
use App\Models\JenisKelamin;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\SuratOnline;
use App\Models\TingkatPendidikan;
use App\Models\WilayahAdministratif;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

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



    public function readPost($slug)
    {
        if(!$slug){
            return abort(404);
        }else{

            // // +1 views every user read a post
            // Post::where('post_slug', $slug)->increment('views');

             // Check if the view cookie exists.
            $cookieName = 'post_viewed_' . $slug;

            if (!Cookie::has($cookieName)) {
                // Cookie doesn't exist; increment view count and set the cookie.

                Post::where('post_slug', $slug)->increment('views');

                // Set the cookie to prevent further incrementing. Delete Cookie after 60 minutes
                Cookie::queue($cookieName, true, 60);
            }



            $post = Post::where('post_slug', $slug)
                            ->with('subcategory')
                            ->with('author')
                            ->first();

            $data = [
                'pageTitle' => Str::ucfirst($post->post_title),
                'post' => $post
            ];

            return view('front.pages.single_post', $data);
        }

    }

    public function statistik_wilayah(){
        $statistik = WilayahAdministratif::all();
        
        return view('front.pages.statistik.wilayah',[
            'pageTitle' => 'Statistik | Wilayah Administratif',
            'all' => $statistik,
            'total_kk' => WilayahAdministratif::sum('kk'),
            'total_laki_laki' => WilayahAdministratif::sum('laki_laki'),
            'total_perempuan' => WilayahAdministratif::sum('perempuan'),
            'jumlah' => $totalSum = WilayahAdministratif::selectRaw('SUM(kk + laki_laki + perempuan) as total_sum')
                                                                ->first()->total_sum,
        ]);
    }

    public function statistik_tingkatPendidikan()
    {
        $statistik = TingkatPendidikan::all();

        return view('front.pages.statistik.tingkat-pendidikan',[

            'pageTitle' => 'Statistik | Tingkat Pendidikan',
            'statistik_name' => 'Statistik Tingkat Pendidikan',
            'all' => $statistik
        ]);
    }

    public function statistik_mataPencaharian()
    {
        $statistik = Pekerjaan::all();

        return view('front.pages.statistik.mata-pencaharian',[

            'pageTitle' => 'Statistik | Mata Pencaharian',
            'statistik_name' => 'Statistik Mata Pencaharian',
            'all' => $statistik
        ]);
    }

    public function statistik_jenisKelamin()
    {
        $statistik = JenisKelamin::all();

        return view('front.pages.statistik.jenis-kelamin',[

            'pageTitle' => 'Statistik | Jenis Kelamin',
            'statistik_name' => 'Statistik Jenis Kelamin',
            'all' => $statistik
        ]);
    }

    public function statistik_golonganUmur()
    {
        $statistik = GolonganUmur::all();

        return view('front.pages.statistik.golongan-umur',[

            'pageTitle' => 'Statistik | Golongan Umur',
            'statistik_name' => 'Statistik Golongan Umur',
            'all' => $statistik
        ]);
    }

    public function statistik_agama()
    {
        $statistik = Agama::all();

        return view('front.pages.statistik.agama',[

            'pageTitle' => 'Statistik | Agama',
            'statistik_name' => 'Statistik Agama',
            'all' => $statistik
        ]);
    }
    
    public function konfirmasi_surat_online($token){

        $find = SuratOnline::where('token',$token)->first();

        
        if($find){
            SuratOnline::where('token', $token)->update([
                'status' => 'masuk',
                'token' => null
            ]);
           return redirect()->route('surat_online')->with('success', 'Permohonan berhasil dikonfirmasi. Mohon menunggu pemberitahuan melalui email');
        
        }else{
            abort(404);
        }
    }

}
