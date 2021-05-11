<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models;

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


Route::get('/',[PageController::class,'posts']);
Route::get('blog/{post}',[PageController::class,'post'])->name('post');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/posts', PostController::class)->middleware('auth')->except('show');

/* Route::get('posts/', [PostController::class,'index'])->name('posts.home')->middleware('auth');
Route::get('posts/create', [PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::get('posts/edit/{id}', [PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::delete('posts/edit/{id}', [PostController::class,'detroy'])->name('posts.delete')->middleware('auth'); */