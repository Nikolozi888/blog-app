<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');


Route::post('/wishlist/create', [WishlistController::class, 'create'])->middleware('auth')->name('wishlist.create');
Route::delete('/wishlist/{rowId}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store'])->middleware('auth')->name('comment.store');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest')->name('login.store');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/category/{slug}', [PostController::class, 'category'])->name('category');

Route::post('welcome/mail/{id}', [UserController::class, 'welcome'])->middleware('auth')->name('welcome.mail');

Route::get('/profile/user/{id}', [UserController::class, 'index'])->middleware('can:user')->name('user.profile');
Route::get('/profile/admin/{id}', [AdminController::class, 'index'])->middleware('can:admin')->name('admin.profile');
