<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MigrationController extends Controller
{
    public function fileStructure(string $id, bool|null $getTask = null)
    {

        $task = [
            '1' => [
                'text' => "В папке с миграциями изначально уже есть некоторые миграции. Нам они пока не нужны. Уберите их из этой папки.",
                'data' => [],
            ],
            '2' => [
                'text' => "С помощью команды artisan сделайте миграцию, создающую таблицу users. Изучите код сгенерированного файла.",
                'data' => [],
            ],

        ];

        if ($getTask) {
            return array_keys($task);
        }

        if (array_key_exists($id, $task)) {
            return view('migrations.file-structure-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
        }
    }
    public function running(string $id, bool|null $getTask = null)
    {

        $task = [
            '1' => [
                'text' => "Сделайте миграцию, создающую таблицу с юзерами. Примените ее. Откройте PMA и убедитесь, что ваша миграция применилась.",
                'data' => [],
            ],
        ];

        if ($getTask) {
            return array_keys($task);
        }

        if (array_key_exists($id, $task)) {
            return view('migrations.running-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
        }
    }
    public function tablesFields(string $id, bool|null $getTask = null)
    {

        $task = [
            '1' => [
                'text' => "Сделайте миграцию, создающую таблицу со статьями. Пусть у этой таблицы будут поля с заголовком статьи, ее текстом, датой создания.",
                'data' => [],
            ],
            '2' => [
                'text' => "Сделайте миграцию, создающую таблицу с юзерами. Пусть у этой таблицы будут поля с именем, фамилией, датой рождения, датой создания юзера.",
                'data' => [],
            ],
        ];

        if ($getTask) {
            return array_keys($task);
        }

        if (array_key_exists($id, $task)) {
            return view('migrations.tables-fields-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
        }
    }
}
