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
Route::get('/', fn()=> view('home', ['title' => 'home']));

Route::prefix('routes')->group(function () {

    Route::get('/', fn() => view('routes.intro'))->name('routes-intro');

    Route::get('/routes-task/{id}', [RoutesController::class, 'routes'])->whereNumber('id')->name('routes-task');

    Route::get('/advanced', fn() => view('routes.advanced'))->name('routes-advanced');
});

// маршруты по задачам раздела route
Route::get('/test', fn()=> 'вы перешли по адресу: /test');

Route::get('/dir/test', fn()=> 'вы перешли по адресу: /dir/test');

Route::get('/user/{name}', fn($name)=> 'вы перешли по адресу: /user/' . $name);

Route::get('/user/{surname}/{name}', fn($surname, $name)=> "вы перешли по адресу: $surname $name");

Route::get('/city/{city?}', fn($city = 'Minsk')=>"Город: $city");

Route::get('/usernum/{id}', fn($id)=> "id = $id")->where('id', '[0-9]+');

Route::get('/userwhere/{id}/{name}', fn($id, $name)=> "id = $id name = $name")->where('id', '[0-9]+')->where('name', '[a-z]{2,}');

Route::get('/posts/{date}', fn($date)=> "дата: $date")->where('date', '\d{2}-\d{2}-\d{4}');

Route::get('/{year}/{month}/{day}', fn($year, $month, $day)=>"дата: $year-$month-$day")->where('year', '\d{4}')->where('month', '\d{2}')->where('day', '\d{2}');

Route::get('/users/{order}', fn($order)=> "В order было записано значение: $order")->where('order', '\b(name|surname|age)\b');

Route::get('/test_slug/{testslug}', fn($testslug)=> "Вы перешли по маршруту: /test_slug/$testslug");
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

    Route::get('/fundamentals/', fn()=> view('blade.fundamentals'))->name('fundamentals');
    Route::get('/fundamentals-task/{id}', [BladeController::class, 'fundamentals'])->whereNumber('id')->name('fundamentals-task');

    Route::get('/conditions/', fn()=> view('blade.conditions'));
    Route::get('/conditions-task/{id}', [BladeController::class, 'conditions'])->whereIn('id', (new BladeController)->conditions(1, 1));

    Route::get('/foreach-directive/', fn()=> view('blade.foreach-directive'));
    Route::get('/foreach-directive-task/{id}', [BladeController::class, 'foreachDirective'])->whereIn('id', (new BladeController)->foreachDirective(1, 1));

    Route::get('/php-code-block/', fn()=> view('blade.php-code-block'));
    Route::get('/php-code-block-task/{id}', [BladeController::class, 'phpCodeBlock'])->whereIn('id', (new BladeController)->phpCodeBlock(1, 1));

    Route::get('/blade-practicum/', fn()=> view('blade.blade-practicum'));
    Route::get('/blade-practicum-task/{id}', [BladeController::class, 'bladePracticum'])->whereIn('id', (new BladeController)->bladePracticum(1, 1));

    Route::get('/components/', fn()=> view('blade.components'))->name('components');
    Route::get('/components-task/{id}', [BladeController::class, 'components'])->whereNumber('id')->name('components-task');
});

Route::get('/collections/', fn()=> view('collections'));

Route::prefix('migrations')->group(function () {
    Route::get('/intro/', fn()=> view('migrations.intro'))->name('migration-intro');

    Route::get('/file-structure/', fn()=> view('migrations.file-structure'))->name('migration-file-structure');
    Route::get('/file-structure-task/{id}', [MigrationController::class, 'fileStructure'])->name('migration-file-structure-tasks');

    Route::get('/running/', fn()=> view('migrations.running'))->name('migration-running');
    Route::get('/running-task/{id}', [MigrationController::class, 'running'])->name('migration-running-tasks');

    Route::get('/tables-fields/', fn()=> view('migrations.tables-fields'))->name('migration-tables-fields');
    Route::get('/tables-fields-task/{id}', [MigrationController::class, 'tablesFields'])->name('migration-tables-fields-tasks');

    Route::get('/migration-fields/', fn()=> view('migrations.migration-fields'))->name('migration-fields');
    Route::get('/migration-fields-task/{id}', [MigrationController::class, 'updateFilds'])->name('migration-fields-task');

    Route::get('/del-change-table/', fn()=> view('migrations.del-change-table'))->name('del-change-table');

    Route::get('/migration-rollback/', fn()=> view('migrations.migration-rollback'))->name('migration-rollback');
    Route::get('/migration-rollback-task/{id}', [MigrationController::class, 'migrationRollback'])->name('migration-rollback-task');
});

Route::prefix('seeders')->group(function () {

    Route::get('/intro/', fn()=> view('seeders.intro'))->name('seeder-intro');

    Route::get('/manual-seeder/', fn()=> view('seeders.manual-seeder'))->name('manual-seeder');
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
    Route::get('/intro/', fn()=> view('eloquent.intro'))->name('eloquent-intro');

    Route::get('/create-and-use/', fn()=> view('eloquent.create-and-use'))->name('create-and-use');
    Route::get('/create-and-use-task/{id}', [EloqumentController::class, 'createAndUse'])->whereNumber('id')->name('create-and-use-task');

    Route::get('/get-data/', fn()=> view('eloquent.get-data'))->name('eloquent-get-data');
    Route::get('/get-data-task/{id}', [EloqumentController::class, 'getData'])->whereNumber('id')->name('eloquent-get-data-task');

    Route::get('/create-update-del/', fn()=> view('eloquent.create-update-del'))->name('eloquent-create-update-del');
    Route::get('/create-update-del-task/{id}', [EloqumentController::class, 'createUpdateDel'])->whereNumber('id')->name('eloquent-create-update-del-task');
});

Route::prefix('relationship')->group(function () {
    Route::get('/intro/', fn()=> view('relationship.intro'))->name('relationship-intro');

    Route::get('/one-to-one/', fn()=> view('relationship.one-to-one'))->name('relationship-one-to-one');
    Route::get('/one-to-one-task/{id}', [EloqumentController::class, 'oneToOne'])->whereNumber('id')->name('relationship-one-to-one-task');

    Route::get('/one-to-many/', fn()=> view('relationship.one-to-many'))->name('relationship-one-to-many');
    Route::get('/one-to-many-task/{id}', [EloqumentController::class, 'oneToMany'])->whereNumber('id')->name('relationship-one-to-many-task');

    Route::get('/many-to-many/', fn()=> view('relationship.many-to-many'))->name('relationship-many-to-many');
    Route::get('/many-to-many-task/{id}', [EloqumentController::class, 'manyToMany'])->whereNumber('id')->name('relationship-many-to-many-task');

    Route::get('/load/', fn()=> view('relationship.load'))->name('relationship-load');
    Route::get('/load-task/{id}', [EloqumentController::class, 'load'])->whereNumber('id')->name('relationship-load-task');
});

Route::prefix('form')->group(function () {
    Route::get('/object-request/', fn()=> view('form.object-request'))->name('form-object-request');
    Route::match(['get', 'post'], '/object-request-task/{id}', [FormController::class, 'objectRequest'])->whereNumber('id')->name('form-object-request-task');

    Route::get('/object-request-method/', fn()=> view('form.object-request-method'))->name('form-object-request-method');
    Route::get('/object-request-method-task/{id}', [FormController::class, 'objectRequestMethod'])->whereNumber('id')->name('form-object-request-method-task');
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
