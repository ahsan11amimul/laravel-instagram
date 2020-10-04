<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/follow/{user}',[App\Http\Controllers\FollowController::class, 'store']);
Route::get('/',[App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/post/create',[App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('/post/{post}',[App\Http\Controllers\PostController::class,'show'])->name('post.show');
//Route::get('/post/{post}',[App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::post('/post/store',[App\Http\Controllers\PostController::class, 'store'])->name('post.store');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{user}',[App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit',[App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::PATCH('/profile/{user}',[App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');