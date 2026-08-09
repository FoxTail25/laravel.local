<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeederController extends Controller
{
    public function manualSeeder(Request $request, string $id,)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 8);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }

        return view('seeders.manual-seeder-task', ['id' => $id, 'text' => $request->text]);
    }
}
