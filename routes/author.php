<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;




Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:web'])->group(function (){
        Route::view('/login','back.pages.auth.login')->name('login');
        Route::view('/forgot-password', 'back.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}', [AuthorController::class,'ResetForm'])->name('reset-form');

    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home', [AuthorController::class,'index'])->name('home');
        Route::post('/logout', [AuthorController::class,'logout'])->name('logout');
        Route::view('/profile','back.pages.profile')->name('profile');
        Route::post('/change-profile-picture', [AuthorController::class,'changeProfilePicture'])->name('change-profile-picture');
    });

    // Only admin can access the following routes
    Route::middleware(['isAdmin'])->group(function(){
        Route::view('/authors', 'back.pages.authors')->name('authors');
        Route::view('/categories','back.pages.categories')->name('categories');

    });

    Route::prefix('posts')->name('posts.')->group(function (){
        Route::view('/add-post','back.pages.add-post')->name('add-post');
        Route::post('/create', [AuthorController::class,'createPost'])->name('create');
        Route::view('/all', 'back.pages.all_posts')->name('all_posts');
        Route::get('/edit-post',[AuthorController::class,'editPost'])->name('edit-post');
        Route::post('/update-post', [AuthorController::class,'updatePost'])->name('update-post');
    });

    Route::prefix('data-desa')->name('data-desa.')->group(function(){
        Route::view('/wilayah-administratif','back.pages.data-desa.wilayah-administratif')->name('wilayah-administratif');
        Route::view('/tingkat-pendidikan','back.pages.data-desa.tingkat-pendidikan')->name('tingkat-pendidikan');
        Route::view('/mata-pencaharian','back.pages.data-desa.pekerjaan')->name('pekerjaan');
        Route::view('/jenis-kelamin','back.pages.data-desa.jenis-kelamin')->name('jenis-kelamin');
    });

});

?>