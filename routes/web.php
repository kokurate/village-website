<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','front.pages.home')->name('home');

Route::get('/post/{any}',[BlogController::class,'readPost'])->name('read_post');
Route::get('/category/{any}',[BlogController::class,'categoryPosts'])->name('category_posts');
Route::get('/posts/tag/{any}',[BlogController::class,'tagPosts'])->name('tag_posts');
Route::get('/search',[BlogController::class,'searchBlog'])->name('search_posts');

#=========== Statistik
Route::get('statistik/wilayah-administratif', [BlogController::class,'statistik_wilayah'])->name('statistik1');
Route::get('statistik/tingkat-pendidikan', [BlogController::class,'statistik_tingkatPendidikan'])->name('statistik2');
Route::get('statistik/mata-pencaharian', [BlogController::class,'statistik_mataPencaharian'])->name('statistik3');
Route::get('statistik/jenis-kelamin', [BlogController::class,'statistik_jenisKelamin'])->name('statistik4');
Route::get('statistik/golongan-umur', [BlogController::class,'statistik_golonganUmur'])->name('statistik5');
Route::get('statistik/agama', [BlogController::class,'statistik_agama'])->name('statistik6');

#=============== Surat Online
Route::view('surat-online','front.pages.surat-online')->name('surat_online');
Route::get('surat-online/konfirmasi/{token}',[BlogController::class,'konfirmasi_surat_online'])->name('konfirmasi_surat_online');