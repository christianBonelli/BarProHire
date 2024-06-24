<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SinglePostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TagController;

// Route::get('/', function(){
//     return view('index');
// });


Route::get('/login', [SessionController::class, 'create']);
Route::get('/users/{user}/profile', [SessionController::class, 'show'])->name('auth.profile');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware();


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::delete('/user/{user}', [RegisteredUserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::get('user/{user}/edit',[RegisteredUserController::class, 'edit']);
Route::patch('/user/{user}', [RegisteredUserController::class, 'update'])->name("user.update")->middleware('auth');



Route::get('/', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);
Route::post('/posts', [PostsController::class, 'store']);
// Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::get('/users/{user}', [PostsController::class, 'show'])->name('users.show');
Route::delete('posts/{post}', [PostsController::class , 'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('user/{user}/social', [SinglePostController::class, 'index'])->name('socialPage');
Route::get('post/{post}', [SinglePostController::class, 'show'])->name('singlePost');
Route::get('posts/{post}/edit',[SinglePostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}', [SinglePostController::class, 'update'])->name('posts.update')->middleware('auth');

Route::get('/tags/{tag:name}', TagController::class);

Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy')->middleware('auth');
// Route::patch('posts/{post}/photos', [PhotoController::class, 'update'])->name('photos.update')->middleware('auth');

Route::get('user/social', function(){
    return view('cViews.socialPage');
});

