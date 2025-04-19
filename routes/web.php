<?php

use Dom\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('posts', PostController::class)->names('posts');
Route::resource('videos', VideoController::class)->names('videos');
Route::resource('comments', CommentController::class)->names('comments');
Route::post('/storepost', [CommentController::class,'storePost'])->name('storepost');

Route::post('/storepost/{post}', [CommentController::class, 'storePost'])->name('storepost');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/storevideo', [CommentController::class,'storeVideo'])->name('storevideo');


Route::post('/storevideo/{post}', [CommentController::class, 'storeVideo'])->name('storevideo');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');




















