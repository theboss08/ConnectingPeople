<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [PostController::class, 'index'])->middleware(['auth'])->name('home_page');

Route::get('/profile/{id}', [ProfileController::class, 'show'])->middleware(['auth'])->name('profile');

Route::post('/comment/{type}', [CommentController::class, 'store'])->middleware(['auth']);

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/edit', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile_edit');

Route::patch('/edit', [ProfileController::class, 'update'])->middleware(['auth']);

Route::post('/post/create/{type}', [PostController::class, 'create'])->middleware(['auth']);

Route::get('/notification', [NotificationController::class, 'index'])->middleware(['auth'])->name('notification');

Route::post('/notification', [NotificationController::class, 'store'])->middleware(['auth']);

Route::post('/accept_request', [FriendsController::class, 'accept'])->middleware(['auth']);

Route::post('/reject_request', [FriendsController::class, 'request'])->middleware(['auth']);

Route::get('/post/text', function() {
    return view('/post/text_post');
})->middleware(['auth']);

Route::get('/post/image', function() {
    return view('/post/image_post');
})->middleware(['auth']);

Route::get('/{type}/{id}', [PostController::class, 'show'])->middleware(['auth']);

require __DIR__.'/auth.php';
