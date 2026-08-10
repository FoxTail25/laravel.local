<?php

use App\Http\Controllers\RoutesController;
use App\Http\Controllers\BladeController;
use App\Http\Controllers\ControllersController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\EloqumentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MigrationController;
use App\Http\Controllers\SeederController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home', ['title' => 'home']);
});
Route::prefix('routes')->group(function () {
    Route::get('/', fn() => view('routes.intro'))->name('routes-intro');
    Route::get('/routes-task/{id}', [RoutesController::class, 'routes'])->whereNumber('id')->name('routes-task');
    Route::get('/advanced', fn() => view('routes.advanced'))->name('routes-advanced');
});

// маршруты по задачам раздела route
Route::get('/test', function () {
    return 'вы перешли по адресу: /test';
});
Route::get('/dir/test', function () {
    return 'вы перешли по адресу: /dir/test';
});
Route::get('/user/{name}', function ($name) {
    return 'вы перешли по адресу: /user/' . $name;
});
Route::get('/user/{surname}/{name}', function ($surname, $name) {
    return "вы перешли по адресу: $surname $name";
});
Route::get('/city/{city?}', function ($city = 'Minsk') {
    return "Город: $city";
});
Route::get('/usernum/{id}', function ($id) {
    return "id = $id";
})->where('id', '[0-9]+');

Route::get('/userwhere/{id}/{name}', function ($id, $name) {
    return "id = $id name = $name";
})->where('id', '[0-9]+')->where('name', '[a-z]{2,}');

Route::get('/posts/{date}', function ($date) {
    return "дата: $date";
})->where('date', '\d{2}-\d{2}-\d{4}');

Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return "дата: $year-$month-$day";
})->where('year', '\d{4}')->where('month', '\d{2}')->where('day', '\d{2}');

Route::get('/users/{order}', function ($order) {
    return "В order было записано значение: $order";
})->where('order', '\b(name|surname|age)\b');

Route::get('/test_slug/{testslug}', function ($testslug) {
    return "Вы перешли по маршруту: /test_slug/$testslug";
});
// окончание маршрутов по задачам раздела route



Route::prefix('controllers')->group(function () {
    Route::get('/', fn() => view('controllers.fundamentals'))->name('controllers-fundamentals');
    Route::get('/controllers-task/{id}', [ControllersController::class, 'base'])->whereNumber('id')->name('controllers-task');
    // Route::get('/advanced', fn() => view('routes.advanced'))->name('routes-advanced');
});
// Маршруты по задачем раздела Контроллеры:

Route::get('/user', [UserController::class, 'show']);
Route::get('/controll/user/all', [UserController::class, 'all']);
Route::get('/controll/user/{name}', [UserController::class, 'name']);
Route::get('/controll/user/{surname}/{name}', [UserController::class, 'surnameAndName']);
Route::get('/controll/user-city/{user}', [UserController::class, 'userCity']);
Route::get('/controll/user-citysave/{user?}', [UserController::class, 'userCitySave']);

// Окончание маршрутов по задачем раздела Контроллеры:

Route::prefix('views')->group(function () {
    Route::get('/base', fn() => view('view.base'))->name('views-base');
    Route::get('/views-task/{id}', [ViewController::class, 'base'])->whereNumber('id')->name('views-task');
    Route::get('/views-test/1', [ViewController::class, 'task1'])->name('views-task-1');
});
// маршруты для задач по теме представления
Route::get('/view/viewOne', [UserController::class, 'viewOne']);
Route::get('/view/viewTwo', [UserController::class, 'viewTwo']);
Route::get('/view/viewThree', [UserController::class, 'viewThree']);
// окончание маршрутов для задач по теме представления


Route::prefix('blade')->group(function () {

    Route::get('/fundamentals/', function () {
        return view('blade.fundamentals');
    })->name('fundamentals');
    Route::get('/fundamentals-task/{id}', [BladeController::class, 'fundamentals'])->whereNumber('id')->name('fundamentals-task');

    Route::get('/conditions/', function () {
        return view('blade.conditions');
    });
    Route::get('/conditions-task/{id}', [BladeController::class, 'conditions'])->whereIn('id', (new BladeController)->conditions(1, 1));

    Route::get('/foreach-directive/', function () {
        return view('blade.foreach-directive');
    });
    Route::get('/foreach-directive-task/{id}', [BladeController::class, 'foreachDirective'])->whereIn('id', (new BladeController)->foreachDirective(1, 1));

    Route::get('/php-code-block/', function () {
        return view('blade.php-code-block');
    });
    Route::get('/php-code-block-task/{id}', [BladeController::class, 'phpCodeBlock'])->whereIn('id', (new BladeController)->phpCodeBlock(1, 1));

    Route::get('/blade-practicum/', function () {
        return view('blade.blade-practicum');
    });
    Route::get('/blade-practicum-task/{id}', [BladeController::class, 'bladePracticum'])->whereIn('id', (new BladeController)->bladePracticum(1, 1));

    Route::get('/components/', function () {
        return view('blade.components');
    })->name('components');
    Route::get('/components-task/{id}', [BladeController::class, 'components'])->whereNumber('id')->name('components-task');
});

Route::get('/collections/', function () {
    return view('collections');
});

Route::prefix('migrations')->group(function () {
    Route::get('/intro/', function () {
        return view('migrations.intro');
    })->name('migration-intro');

    Route::get('/file-structure/', function () {
        return view('migrations.file-structure');
    })->name('migration-file-structure');
    Route::get('/file-structure-task/{id}', [MigrationController::class, 'fileStructure'])->name('migration-file-structure-tasks');

    Route::get('/running/', function () {
        return view('migrations.running');
    })->name('migration-running');
    Route::get('/running-task/{id}', [MigrationController::class, 'running'])->name('migration-running-tasks');

    Route::get('/tables-fields/', function () {
        return view('migrations.tables-fields');
    })->name('migration-tables-fields');
    Route::get('/tables-fields-task/{id}', [MigrationController::class, 'tablesFields'])->name('migration-tables-fields-tasks');

    Route::get('/migration-fields/', function () {
        return view('migrations.migration-fields');
    })->name('migration-fields');
    Route::get('/migration-fields-task/{id}', [MigrationController::class, 'updateFilds'])->name('migration-fields-task');

    Route::get('/del-change-table/', function () {
        return view('migrations.del-change-table');
    })->name('del-change-table');

    Route::get('/migration-rollback/', function () {
        return view('migrations.migration-rollback');
    })->name('migration-rollback');
    Route::get('/migration-rollback-task/{id}', [MigrationController::class, 'migrationRollback'])->name('migration-rollback-task');
});

Route::prefix('seeders')->group(function () {
    Route::get('/intro/', function () {
        return view('seeders.intro');
    })->name('seeder-intro');

    Route::get('/manual-seeder/', function () {
        return view('seeders.manual-seeder');
    })->name('manual-seeder');
    Route::get('/manual-seeder-task/{id}', [SeederController::class, 'manualSeeder'])->name('manual-seeder-task');
});

Route::prefix('DB')->group(function () {
    Route::get('/intro/', fn()=> view('DB.intro'))->name('qb-intro');
    Route::get('/intro-task/{id}', [DbController::class, 'intro'])->name('qb-intro-task');

    Route::get('/records/', fn()=> view('DB.records'))->name('qb-record');
    Route::get('/records-task/{id}', [DbController::class, 'record'])
    ->name('qb-records-task');

    Route::get('/record-where/', fn()=> view('DB.record-where'))->name('qb-record-where');
    Route::get('/record-where-task/{id}', [DbController::class, 'recordWhere'])->name('qb-record-where-task');

    Route::get('/record-sort/', fn()=> view('DB.record-sort'))->name('qb-record-sort');
    Route::get('/record-sort-task/{id}', [DbController::class, 'recordSort'])->name('qb-record-sort-task');

    Route::get('/insert-update-del/', fn()=> view('DB.insert-update-del'))->name('qb-insert-update-del');
    Route::get('/insert-update-del-task/{id}', [DbController::class, 'InsertUpdateDel'])->name('qb-insert-update-del-task');
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

    Route::get('/load/', function () {
        return view('relationship.load');
    });
    Route::get('/load-task/{id}', [EloqumentController::class, 'load'])->whereNumber('id');
});

Route::prefix('form')->group(function () {
    Route::get('/object-request/', function () {
        return view('form.object-request');
    });
    Route::match(['get', 'post'], '/object-request-task/{id}', [FormController::class, 'objectRequest'])->whereNumber('id');

    Route::get('/object-request-method/', function () {
        return view('form.object-request-method');
    });
    Route::get('/object-request-method-task/{id}', [FormController::class, 'objectRequestMethod'])->whereNumber('id');
});

Route::prefix('pagination')->group(function () {
    Route::get('/intro/', function () {
        return view('pagination.intro');
    });
    Route::get('/users', [TestController::class, 'paginateTest']);
});

Route::prefix('education-task')->group(function () {
    Route::get('/post/{id}', [TestController::class, 'post'])->whereNumber('id');
});
