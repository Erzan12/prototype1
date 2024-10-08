<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});
// handle logging out of a user account
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Handle the listing of all the blog post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Handle the creation of blogs
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Handle the storing of blogs into the database
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Handle the deletion of a blog post
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('posts.destroy');

// Handle the Editing of a blog post
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
ROute::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');

// Handle the filtering of all blog post information
Route::get('/posts/filter', [PostController::class,'filter'])->name('posts.filter');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
