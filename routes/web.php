<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home', ['title' => 'home']);
});


Route::get('/user', [UserController::class, 'show']);
Route::get('/user/all', [UserController::class, 'all']);
Route::get('/user/view', [UserController::class, 'testView']);
Route::get('/user/{surname}/{name}', [UserController::class, 'name']);
Route::get('/city/{user}', [UserController::class, 'userCity']);
