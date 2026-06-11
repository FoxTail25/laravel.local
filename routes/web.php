<?php

use App\Http\Controllers\BladeController;
use App\Http\Controllers\MigrationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home', ['title' => 'home']);
});
Route::prefix('blade')->group(function () {

    Route::get('/variables-attributes/', function () {
        return view('blade.variables-attributes');
    });
    Route::get('/variables-attributes-task/{id}', [BladeController::class, 'variablesAttributes'])->whereIn('id', (new BladeController)->variablesAttributes(1, 1));

    Route::get('/arbitrary-code/', function () {
        return view('blade.arbitrary-code');
    });
    Route::get('/arbitrary-code-task/{id}', [BladeController::class, 'arbitraryCode'])->whereIn('id', (new BladeController)->arbitraryCode(1, 1));

    Route::get('/arrays/', function () {
        return view('blade.arrays');
    });
    Route::get('/arrays-task/{id}', [BladeController::class, 'arrays'])->whereIn('id', (new BladeController)->arrays(1, 1));

    Route::get('/variables-checking/', function () {
        return view('blade.variables-checking');
    });
    Route::get('/variables-checking-task/{id}', [BladeController::class, 'variablesChecking'])->whereIn('id', (new BladeController)->variablesChecking(1, 1));

    Route::get('/unescaped-data-output/', function () {
        return view('blade.unescaped-data-output');
    });
    Route::get('/unescaped-data-output-task/{id}', [BladeController::class, 'unescapedDataOutput'])->whereIn('id', [1]);

    Route::get('/conditions/', function () {
        return view('blade.conditions');
    });
    Route::get('/conditions-task/{id}', [BladeController::class, 'conditions'])->whereIn('id', (new BladeController)->conditions(1, 1));

    Route::get('/foreach-directive/', function () {
        return view('blade.foreach-directive');
    });
    // Route::get('/blade/foreach-directive-task/{id}', [BladeController::class, 'foreachDirective'])->whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    Route::get('/foreach-directive-task/{id}', [BladeController::class, 'foreachDirective'])->whereIn('id', (new BladeController)->foreachDirective(1, 1));

    Route::get('/php-code-block/', function () {
        return view('blade.php-code-block');
    });
    Route::get('/php-code-block-task/{id}', [BladeController::class, 'phpCodeBlock'])->whereIn('id', (new BladeController)->phpCodeBlock(1, 1));

    Route::get('/blade-practicum/', function () {
        return view('blade.blade-practicum');
    });
    Route::get('/blade-practicum-task/{id}', [BladeController::class, 'bladePracticum'])->whereIn('id', (new BladeController)->bladePracticum(1, 1));
});

Route::get('/collections/', function () {
    return view('collections');
});

Route::prefix('migrations')->group(function () {
    Route::get('/intro/', function () {
        return view('migrations.intro');
    });

    Route::get('/file-structure/', function () {
        return view('migrations.file-structure');
    });
    Route::get('/file-structure-task/{id}', [MigrationController::class, 'fileStructure'])->whereIn('id', (new MigrationController)->fileStructure(1, 1));

    Route::get('/running/', function () {
        return view('migrations.running');
    });
    Route::get('/running-task/{id}', [MigrationController::class, 'running'])->whereIn('id', (new MigrationController)->running(1, 1));

    Route::get('/tables-fields/', function () {
        return view('migrations.tables-fields');
    });
    Route::get('/tables-fields-task/{id}', [MigrationController::class, 'tablesFields'])->whereIn('id', (new MigrationController)->tablesFields(1, 1));
});
