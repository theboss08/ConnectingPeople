<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

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

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/edit', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile_edit');

Route::patch('/edit', [ProfileController::class, 'update'])->middleware(['auth']);

Route::post('/post/create/{type}', [PostController::class, 'create'])->middleware(['auth']);

Route::get('/post/text', function() {
    return view('/post/text_post');
})->middleware(['auth']);

Route::get('/post/image', function() {
    return view('/post/image_post');
})->middleware(['auth']);

Route::get('/post/video', function() {
    return view('/post/video_post');
})->middleware(['auth']);

require __DIR__.'/auth.php';
