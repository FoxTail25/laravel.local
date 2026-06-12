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
    public function updateFilds(string $id, bool|null $getTask = null)
    {

        $task = [
            '1' => [
                'text' => "В таблице с юзерами измените размер поля name.",
                'data' => [],
            ],
            '2' => [
                'text' => "Написать миграцию на удалени из таблицы с юзерами поле age.",
                'data' => [],
            ],
            '3' => [
                'text' => "Написать миграцию на удалени из таблицы с юзерами поле name и surname.",
                'data' => [],
            ],
            '4' => [
                'text' => "В таблице с юзерами переименуйте поле name в поле first_name, а поле surname в second_name.",
                'data' => [],
            ],
            '5' => [
                'text' => "Добавьте в таблице с юзерами комментарий к полю email.",
                'data' => [],
            ],
            '6' => [
                'text' => "Сделайте так, чтобы в таблице с юзерами поле salary по умолчанию принимало значение 0.",
                'data' => [],
            ],
            '7' => [
                'text' => "Разрешите в таблице с юзерами полю age принимать значение null.",
                'data' => [],
            ],
            '8' => [
                'text' => "Сделайте в таблице с юзерами поле age беззнаковым.",
                'data' => [],
            ],
            '9' => [
                'text' => "В таблице с юзерами переместите поле name на первое место.",
                'data' => [],
            ],
            '10' => [
                'text' => "Добавьте к таблице с юзерами новое поле sex поле поля id.",
                'data' => [],
            ],
        ];

        if ($getTask) {
            return array_keys($task);
        }
        return view('migrations.migration-fields-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
    }
    public function migrationRollback(string $id, bool|null $getTask = null)
    {

        $task = [
            '1' => [
                'text' => "Сделайте миграцию, которая добавляет в таблицу новое поле. Пропишите откат этой миграции.",
                'data' => [],
            ],
            '2' => [
                'text' => "Сделайте миграцию, которая удаляет поле из таблицы. Пропишите откат этой миграции.",
                'data' => [],
            ],
            '3' => [
                'text' => "Сделайте миграцию, которая удаляет несколько полей из таблицы. Пропишите откат этой миграции.",
                'data' => [],
            ],
            '4' => [
                'text' => "Сделайте миграцию, которая поменяет порядок полей в таблице. Пропишите откат этой миграции.",
                'data' => [],
            ],
            '5' => [
                'text' => "Сделайте миграцию, которая переименовывает таблицу. Пропишите откат этой миграции.",
                'data' => [],
            ],
        ];

        if ($getTask) {
            return array_keys($task);
        }
        return view('migrations.migration-rollback-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
    }
}
