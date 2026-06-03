<?php

use App\Http\Controllers\BladeController;
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
Route::get('/blade/1', [BladeController::class, 'one1']);
Route::get('/blade/21', [BladeController::class, 'two1']);
Route::get('/blade/22', [BladeController::class, 'two2']);
Route::get('/blade/23', [BladeController::class, 'two3']);
Route::get('/blade/24', [BladeController::class, 'two4']);
Route::get('/blade/31', [BladeController::class, 'three1']);
Route::get('/blade/41', [BladeController::class, 'four1']);
Route::get('/blade/42', [BladeController::class, 'four2']);


Route::get('/blade/variables-checking/', function () {
    return view('blade.variables-checking');
});
Route::get('/blade/variables-checking/{id}', [BladeController::class, 'variablesChecking'])->whereIn('id', [1, 2, 3]);


Route::get('/blade/unescaped-data-output', function () {
    return view('blade.unescaped-data-output');
});
Route::get('/blade/unescaped-data-output/{id}', [BladeController::class, 'unescapedDataOutput'])->whereIn('id', [1]);


Route::get('/blade/conditions', function () {
    return view('blade.conditions');
});
Route::get('/blade/conditions/{id}', [BladeController::class, 'conditions'])->whereIn('id', [1, 2, 3, 4]);
