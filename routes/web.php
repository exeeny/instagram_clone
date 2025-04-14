<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;

Route::get('/email', function(){
    return new WelcomeMail();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/browsePosts', [PostsController::class, 'browse']);

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/searchMore', [SearchController::class, 'fullSearch']);



Route::get('/profiles/{user}', [ProfilesController::class, 'show'])->name('profiles.show');

Route::get('/profiles/{user}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');
Route::patch('/profiles/{user}', [ProfilesController::class, 'update'])->name('profiles.update');

Route::get('/post/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('post', [PostsController::class, 'store'])->name('posts.store');
Route::get('post/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::delete('post/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::get('/dashboard', [PostsController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/follow/{user}', [FollowsController::class, 'store']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
