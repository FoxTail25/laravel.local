<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function base(Request $request, int $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 10);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }
        $data = [];

        if ($id == 2) {
            $data = ['name' => 'John', 'surname' => 'Smit'];
        }

        return view('view.view-base-task', [
            'id' => $id,
            'text' => $request->text,
            'data' => $data
        ]);
    }
    public function task1()
    {
        return view('view.task1');
    }
}
