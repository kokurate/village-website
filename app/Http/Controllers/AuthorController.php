<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.home');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login')->with('success','Anda berhasil keluar');
    }
    
    public function ResetForm(Request $request, $token = null)
    {
        $data = [
            'pageTitle' => 'Reset Password'
        ];

        return view('back.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }


    public function changeProfilePicture(Request $request)
    {
        $user = User::find(auth('web')->id());
        $path = 'back/dist/img/authors/';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name = 'AIMG'.$user->id.time().rand(1,100000).'.jpg';

        if($old_picture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
        }

        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'picture' => $new_picture_name
            ]);
            return response()->json(['status' => 1, 'msg' => 'Foto profil Anda telah berhasil diperbarui']);
        }else{
            return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
        }
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_category' => 'required|exists:sub_categories,id',
            'featured_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ],[
            'post_title.required' => 'Judul tidak boleh kosong',
            'post_content.required' => 'Content tidak boleh kosong',
            'post_category.required' => 'Kategori harus dipilih',
            'post_category.exists' => 'Kategori tidak terdaftar',
            'featured_image.required' => 'Gambar tidak boleh kosong',
            'featured_image.image' => 'Format gambar tidak benar',
            'featured_image.mimes' => 'Hanya boleh tipe file jpeg,jpg,png',
            'featured_image.max' => 'Maksimal 2mb',
        ]);
        if($request->hasFile('featured_image')){
            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            if($upload){
                $post = new Post();
                $post->author_id = auth()->id();
                $post->category_id = $request->post_category;
                $post->post_title = $request->post_title;
                // $post->post_slug = Str::slug($request->post_title);
                $post->post_content = $request->post_content;
                $post->featured_image = $new_filename;
                $saved = $post->save();

                if($saved){
                    return response()->json(['code' => 1 , 'msg' => 'Post baru telah berhasil ditambahkan']);
                }else{
                    return response()->json(['code' => 3 , 'msg' => 'Ada yang salah saat menyimpan data post']);
                }

            }else{
                return response()->json(['code' => 3 , 'msg' => 'Ada yang salah saat proses unggah image']);
            }


        }
    }

}
