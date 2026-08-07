<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllersController extends Controller
{
    public function base(Request $request, int $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 9);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }


        return view('controllers.fundamentals-task', [
            'id' => $id,
            'text' => $request->text,
        ]);
    }
}
