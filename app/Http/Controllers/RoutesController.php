<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function routes(Request $request, int $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 30);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }


        return view('routes.intro-task', [
            'id' => $id,
            'text' => $request->text,
        ]);
    }
}
