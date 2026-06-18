<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DbController extends Controller
{
    public function intro(int|string $id, int|null $getTask = null)
    {
        $task = [
            '1' => [
                'text' => "Подключите фасад DB к контроллеру юзеров.",
                'data' => [],
            ],
        ];
        if ($getTask) {
            return array_keys($task);
        }
        return view('DB.intro-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
    }

    public function record(int|string $id, int|null $getTask = null)
    {
        $task = [
            '1' => [
                'text' => "Получите все записи из таблицы users. Переберите полученные записи циклом и выведите их в представлении в виде HTML таблицы.",
                'data' => [(new UserController)->getAllRecord()],
            ],
            '2' => [
                'text' => "При получении данных из таблицы с юзерами оставьте в выборке только поля name и email.",
                'data' => [(new UserController)->getFieldRecord(['name', 'email'])],
            ],

        ];
        if ($getTask) {
            return array_keys($task);
        }
        return view('DB.records-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
    }
}
