<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CRUD_practiceController extends Controller
{
    public function practice(Request $request, int $id)
    {
        $tasks = [
            '1' => fn() => [
                'users'  => $users = User::all(),
                'fields' => array_keys($users->first()?->toArray() ?? [])
                // Как это работает:
                // В строке 'users' => $users = User::all() мы одновременно делаем запрос к базе, записываем результат в переменную $users и отдаем её в массив.В следующей строке 'fields' => ... переменная $users уже существует и заполнена данными! Мы просто берем из неё первого пользователя, не дергая базу данных второй раз.Этот трюк часто используется, чтобы соблюсти баланс между красотой кода и его эффективностью.
            ],
            '2' => fn()=> [],
        ];

        if (!isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $data = $tasks[$id]();

        return view('CRUD-practice.practice-task', [
            'id' => $id,
            'text' => $request->text,
            'data' => $data
        ]);
    }
}
