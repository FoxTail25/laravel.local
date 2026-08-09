<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MigrationController extends Controller
{
    public function fileStructure(Request $request, string $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 2);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }

        return view('migrations.file-structure-task', ['id' => $id, 'text' => $request->text,]);
    }
    public function running(Request $request, string $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 1);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }

        return view('migrations.running-task', ['id' => $id, 'text' => $request->text]);
    }
    public function tablesFields(Request $request, string $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 2);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }

        return view('migrations.tables-fields-task', ['id' => $id, 'text' => $request->text]);
    }
    public function updateFilds(Request $request, string $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 10);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }

        return view('migrations.migration-fields-task', ['id' => $id, 'text' => $request->text]);
    }
    public function migrationRollback(Request $request, string $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 5);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }

        return view('migrations.migration-rollback-task', ['id' => $id, 'text' => $request->text]);
    }
}
