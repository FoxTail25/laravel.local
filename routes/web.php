<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return '!! Hello laravel !!';
});
Route::get('/test', function () {
    return 'Это тестовая страница';
});
Route::get('/dir/test', function () {
    return 'Некое тестовое сообщение';
});
// Route::get('/user/{name}', function ($name) {
//     return 'Пользователь '.$name;
// });
// Route::get('/user/{surname}/{name}', function ($surname, $name) {
//     return "Пользователь $surname $name";
// });

//адрес вида /city/:city, где в параметре будет задаваться город. Сделайте так, чтобы город был необязательным параметром и по умолчанию имел значение minsk.
Route::get('/city/{city?}', function ($city = 'Minsk') {
    return "Город: $city";
});

//вида /user/:id/:name, где вместо :id должно быть число, а вместо :name - строка, состоящая из маленьких латинских букв количеством более 2-х.
Route::get('/user/{id}/{name}', function ($id, $name) {
    return "id пользователя: $id $name";
})->where('id', '[0-9]+')->where('name', '[a-z]{3,}');

// маршрут вида /posts/:date, где вместо :date должна быть дата в формате год-месяц-день.
Route::get('/post/{date}', function ($date) {
    return "Дата поста: $date";
})->where('date', '^\d{4}-[0-1][0-9]-[0-3][0-9]$');

// маршрут вида /:year/:month/:day, где вместо :year должен быть год, вместо :month - месяц, вместо :day - день.
Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return "Дата поста: $day $month $year";
})->where('year', '^\d{4}$')->where('month', '^[0-1][0-9]$')->where('day', '^[0-3][0-9]$');

// маршрут вида /users/:order, где вместо :order должно быть одно из значений: 'name', 'surname' или 'age'.
Route::get('/users/{order}', function ($order) {
    return "Пользователь: $order";
})->where('order', '^name|surname|age$');

// маршрут вида /user/:id, где вместо :id должно быть число.
Route::get('/users/{id}', function ($id) {
    return "ID пользователя: $id";
})->whereNumber('id');

// маршрут вида /city/:name, где вместо :name должны быть буквы
Route::get('/city/{name}', function ($name) {
    return "ID пользователя: $name";
})->whereAlpha('name');

// маршрут вида /where/:condition, где вместо :name должны быть 'in' или 'out'
Route::get('/where/{condition}', function ($condition) {
    return "ID пользователя: $condition";
})->whereIn('condition', ['in', 'out']);



