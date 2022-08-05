<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
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


// All blogs
Route::get('/', [BlogController::class, 'index']);


// show add post form
Route::get('/blogs/create', [BlogController::class, 'create']);

// store post data from form
Route::post('/blogs', [BlogController::class, 'store']);


// single blog
Route::get('/blogs/{blog}', [BlogController::class, 'show']);
