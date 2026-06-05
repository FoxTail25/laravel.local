<?php

use App\Http\Controllers\BladeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home', ['title' => 'home']);
});

Route::get('/blade/variables-attributes/', function () {
    return view('blade.variables-attributes');
});
Route::get('/blade/variables-attributes-task/{id}', [BladeController::class, 'variablesAttributes'])->whereIn('id', (new BladeController)->variablesAttributes(1, 1));

Route::get('/blade/arbitrary-code/', function () {
    return view('blade.arbitrary-code');
});
Route::get('/blade/arbitrary-code-task/{id}', [BladeController::class, 'arbitraryCode'])->whereIn('id', (new BladeController)->arbitraryCode(1, 1));

Route::get('/blade/arrays/', function () {
    return view('blade.arrays');
});
Route::get('/blade/arrays-task/{id}', [BladeController::class, 'arrays'])->whereIn('id', (new BladeController)->arrays(1, 1));

Route::get('/blade/variables-checking/', function () {
    return view('blade.variables-checking');
});
Route::get('/blade/variables-checking-task/{id}', [BladeController::class, 'variablesChecking'])->whereIn('id', (new BladeController)->variablesChecking(1, 1));

Route::get('/blade/unescaped-data-output/', function () {
    return view('blade.unescaped-data-output');
});
Route::get('/blade/unescaped-data-output-task/{id}', [BladeController::class, 'unescapedDataOutput'])->whereIn('id', [1]);

Route::get('/blade/conditions/', function () {
    return view('blade.conditions');
});
Route::get('/blade/conditions-task/{id}', [BladeController::class, 'conditions'])->whereIn('id', (new BladeController)->conditions(1, 1));

Route::get('/blade/foreach-directive/', function () {
    return view('blade.foreach-directive');
});
// Route::get('/blade/foreach-directive-task/{id}', [BladeController::class, 'foreachDirective'])->whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
Route::get('/blade/foreach-directive-task/{id}', [BladeController::class, 'foreachDirective'])->whereIn('id', (new BladeController)->foreachDirective(1, 1));

Route::get('/blade/php-code-block/', function () {
    return view('blade.php-code-block');
});
Route::get('/blade/php-code-block-task/{id}', [BladeController::class, 'phpCodeBlock'])->whereIn('id', (new BladeController)->phpCodeBlock(1, 1));
