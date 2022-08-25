<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// fetch mysql data to frontend
// Route::get('/blog', [BlogController::class, 'rtrnAll']);
    // didnt work, i think i need some api middleware