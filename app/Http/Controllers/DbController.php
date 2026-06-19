<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        $tasks = [
            '1' => [
                'text' => "Получите все записи из таблицы users. Переберите полученные записи циклом и выведите их в представлении в виде HTML таблицы.",
                'data' => fn() => [DB::table('users')->get()],
            ],
            '2' => [
                'text' => "При получении данных из таблицы с юзерами оставьте в выборке только поля name и email.",
                'data' => fn() => [DB::table('users')->select('name', 'email')->get()],
            ],
            '3' => [
                'text' => "При получении данных из таблицы с юзерами переименуйте поле email на user_email.",
                'data' => fn() => [DB::table('users')->select('name', 'email as user_email')->get()],
            ],
            '4' => [
                'text' => "Получите всех юзеров с возрастом, равным 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', 30)->get()],
            ],
            '5' => [
                'text' => "Получите всех юзеров с возрастом, не равным 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '!=', 30)->get()],
            ],
            '6' => [
                'text' => "Получите всех юзеров с возрастом, больше 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '>', 30)->get()],
            ],
            '7' => [
                'text' => "Получите всех юзеров с возрастом, меньше 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '<', 30)->get()],
            ],
            '8' => [
                'text' => "Получите всех юзеров с возрастом, меньшим или равным 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '<=', 30)->get()],
            ],
            '9' => [
                'text' => "Получите всех юзеров с возрастом от 20 до 30 лет.",
                'data' => fn() => [DB::table('users')
                    ->where('age', '>', '20')
                    ->where('age', '<', '30')
                    ->get()],
            ],
            '10' => [
                'text' => "Получите всех юзеров с возрастом 30 или id, большем 4.",
                'data' => fn() => [DB::table('users')
                    ->where('age', '30')
                    ->orWhere('id', '>', '4')
                    ->get()],
            ],
            '11' => [
                'text' => "Получите всех юзеров с возрастом 30, или зарплатой 500, или id, большем 9,",
                'data' => fn() => [DB::table('users')
                    ->where('age', '30')
                    ->orWhere('salary', '500')
                    ->orWhere('id', '>', '9')
                    ->get()],
            ],
            '12' => [
                'text' => "Получите юзеров, у которых зарплата равна 500 либо возраст от 20 до 30.",
                'data' => fn() => [DB::table('users')
                    ->where('salary', '500')
                    ->orWhere(function ($query) {
                        $query
                            ->where('age', '>', 20)
                            ->where('age', '<', 30);
                    })
                    ->get()],
            ],
            '13' => [
                'text' => "Получите юзера с id, равным 3.",
                'data' => fn() => [DB::table('users')->where('id', 3)->first()],
            ],
            '14' => [
                'text' => "modelTest",
                'data' => fn() => User::all(),
            ],

        ];
        if ($getTask) {
            return count($tasks);
        }
        $resultData = $tasks[$id]['data']();
        return view('DB.records-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
}
