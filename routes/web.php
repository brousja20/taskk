<?php

use Illuminate\Support\Facades\Route;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

// All blogs
Route::get('/', [BlogController::class, 'index'])->middleware('auth');

// show add blog form
Route::get('/blogs/create', [BlogController::class, 'create'])->middleware('auth');

// store post data from form
Route::post('/blogs', [BlogController::class, 'store'])->middleware('auth');

// show edit blog form
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->middleware('auth');

// update data from edit form
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->middleware('auth');

// delete blog
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->middleware('auth');

// manage blogs
Route::get('/blogs/manage', [BlogController::class, 'manage'])->middleware('auth');

// temporary professional problem solver api
Route::get('/blogs/managejson', [BlogController::class, 'rtrnAll'])->middleware('auth');

// single blog
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->middleware('auth');

// ================== comments ======================

// store comments
Route::post('/blogs/{blog}/comments', [CommentsController::class, 'store']);

// delete comments
Route::delete('/comments/{comment}', [CommentsController::class, 'destroy']);

// =================== users =======================

// show register user form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('/users', [UserController::class, 'store']);

// logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// ===== admin ======
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);
  Route::resource('blogs', BlogController::class);
});