<?php

use App\Http\Controllers\BladeController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\EloqumentController;
use App\Http\Controllers\MigrationController;
use App\Http\Controllers\SeederController;
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

    Route::get('/migration-fields/', function () {
        return view('migrations.migration-fields');
    });
    Route::get('/migration-fields-task/{id}', [MigrationController::class, 'updateFilds'])->whereIn('id', (new MigrationController)->updateFilds(1, 1));

    Route::get('/del-change-table/', function () {
        return view('migrations.del-change-table');
    });

    Route::get('/migration-rollback/', function () {
        return view('migrations.migration-rollback');
    });
    Route::get('/migration-rollback-task/{id}', [MigrationController::class, 'migrationRollback'])->whereIn('id', (new MigrationController)->migrationRollback(1, 1));
});

Route::prefix('seeders')->group(function () {
    Route::get('/intro/', function () {
        return view('seeders.intro');
    });

    Route::get('/manual-seeder/', function () {
        return view('seeders.manual-seeder');
    });
    Route::get('/manual-seeder-task/{id}', [SeederController::class, 'manualSeeder'])->whereIn('id', (new SeederController)->manualSeeder(1, 1));
});

Route::prefix('DB')->group(function () {
    Route::get('/intro/', function () {
        return view('DB.intro');
    });
    Route::get('/intro-task/{id}', [DbController::class, 'intro'])->whereIn('id', (new DbController)->intro(1, 1));

    Route::get('/records/', function () {
        return view('DB.records');
    });
    Route::get('/records-task/{id}', [DbController::class, 'record'])->whereIn('id', range(1, (new DbController)->record(1, 1)));

    Route::get('/record-where/', function () {
        return view('DB.record-where');
    });
    Route::get('/record-where-task/{id}', [DbController::class, 'recordWhere'])->whereIn('id', range(1, (new DbController)->recordWhere(1, 1)));

    Route::get('/record-sort/', function () {
        return view('DB.record-sort');
    });
    Route::get('/record-sort-task/{id}', [DbController::class, 'recordSort'])->whereIn('id', range(1, (new DbController)->record(1, 1)));

    Route::get('/insert-update-del/', function () {
        return view('DB.insert-update-del');
    });
    Route::get('/insert-update-del-task/{id}', [DbController::class, 'InsertUpdateDel'])->whereNumber('id');
});

Route::prefix('eloquent')->group(function () {
    Route::get('/intro/', function () {
        return view('eloquent.intro');
    });

    Route::get('/create-and-use/', function () {
        return view('eloquent.create-and-use');
    });
    Route::get('/create-and-use-task/{id}', [EloqumentController::class, 'createAndUse'])->whereNumber('id');

    Route::get('/get-data/', function () {
        return view('eloquent.get-data');
    });
    Route::get('/get-data-task/{id}', [EloqumentController::class, 'getData'])->whereNumber('id');

    Route::get('/create-update-del/', function () {
        return view('eloquent.create-update-del');
    });
    Route::get('/create-update-del-task/{id}', [EloqumentController::class, 'createUpdateDel'])->whereNumber('id');

});

Route::prefix('relationship')->group(function () {
    Route::get('/intro/', function () {
        return view('relationship.intro');
    });

    Route::get('/one-to-one/', function () {
        return view('relationship.one-to-one');
    });
    Route::get('/one-to-one-task/{id}', [EloqumentController::class, 'oneToOne'])->whereNumber('id');

    Route::get('/one-to-many/', function () {
        return view('relationship.one-to-many');
    });
    Route::get('/one-to-many-task/{id}', [EloqumentController::class, 'oneToMany'])->whereNumber('id');

    Route::get('/many-to-many/', function () {
        return view('relationship.many-to-many');
    });
    Route::get('/many-to-many-task/{id}', [EloqumentController::class, 'manyToMany'])->whereNumber('id');
});
