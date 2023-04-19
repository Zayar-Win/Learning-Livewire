<?php

use App\Models\Post;
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

Route::get('/register', \App\Http\Livewire\Register::class);
Route::get('/', function () {
    return view('test', [
        'posts' => Post::all(),
    ]);
});

Route::get('/post/{post}', function (Post $post) {
    return view('posts.index', [
        'post' => $post
    ]);
});

Route::get('/post/{post}/edit', function (Post $post) {
    return view('posts.edit', [
        'post' => $post
    ]);
});
