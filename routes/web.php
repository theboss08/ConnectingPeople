<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LikeController;

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


// Notification Routes
Route::get('/notification', [NotificationController::class, 'index'])->middleware(['auth'])->name('notification');
Route::post('/notification', [NotificationController::class, 'store'])->middleware(['auth']);


// Request handling routes
Route::post('/accept_request', [FriendsController::class, 'accept'])->middleware(['auth']);
Route::post('/reject_request', [FriendsController::class, 'request'])->middleware(['auth']);


// Searching people route
Route::get('/search', [SearchController::class, 'index'])->middleware(['auth']);


//Chat Routes
Route::get('/chat/{user_id_2}', [ChatController::class, 'show'])->middleware(['auth'])->name('chat');
Route::get('chat/messages/{user_id_2}', [ChatController::class, 'messages'])->middleware(['auth']);
Route::post('/chat/message/{user_id_2}', [ChatController::class, 'newMessage'])->middleware(['auth']);

// Route for getting posts
Route::get('/post/text', function() {
    return view('/post/text_post');
})->middleware(['auth']);

Route::get('/post/image', function() {
    return view('/post/image_post');
})->middleware(['auth']);

// Like Controller Routes
Route::post('/like/{type}', [LikeController::class, 'index'])->middleware(['auth']);


// route for showing post
Route::get('/{type}/{id}', [PostController::class, 'show'])->middleware(['auth']);

require __DIR__.'/auth.php';
