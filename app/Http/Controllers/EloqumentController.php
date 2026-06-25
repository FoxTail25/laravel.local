<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class EloqumentController extends Controller
{
    public function createAndUse(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => "С помощью artisan сгенерируйте модель для таблицы cities.",
                'data' => fn() => []
            ],
            '2' => [
                'text' => "Подключите модель Users к вашему контроллеру.",
                'data' => fn() => []
            ],

        ];



        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[$id])) {
            abort(404, "Задача не найдена");
        }

        $resultData = $tasks[$id]['data']();

        return view('eloquent.create-and-use-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
    public function getData(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => "Получите всех юзеров.",
                'data' => fn() => User::all()
            ],


        ];



        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[$id])) {
            abort(404, "Задача не найдена");
        }

        $resultData = $tasks[$id]['data']();

        return view('eloquent.create-and-use-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
}
