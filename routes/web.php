<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

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


/*
INFO
dodělal jsem věci co jsem nestihl, zapomněl jsem to postupně commitovat takže to pushnu všechno najednou

added filter by author,
option to update your blog,
user registration + login + logout,
navbar changes when user is logged,
relations between user and blogs(foreign key),
user can't see homepage if he isn't logged and is redirected to login page,
user can't edit others blogs(can access edit page through url, but changes wont save)

*/

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

// professional problem solver api
Route::get('/blogs/managejson', [BlogController::class, 'rtrnAll'])->middleware('auth');

// single blog
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->middleware('auth');


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