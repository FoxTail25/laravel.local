<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeederController extends Controller
{
    public function manualSeeder(string $id, bool|null $getTask = null)
    {

        $task = [
            '1' => [
                'text' => "Добавьте данные в таблицу с юзерами.",
                'data' => [],
            ],
            '2' => [
                'text' => "Заполните таблицу с юзерами 10-ю записями со случайными строками.",
                'data' => [],
            ],
            '3' => [
                'text' => "Выполните вставку 10 юзеров, захешировав их пароли.",
                'data' => [],
            ],
            '4' => [
                'text' => "Сделайте отдельный сидер для таблицы с юзерами.",
                'data' => [],
            ],
            '5' => [
                'text' => "Сделайте отдельный сидер для таблицы с городами.",
                'data' => [],
            ],
            '6' => [
                'text' => "Сделайте отдельный сидер для таблицы со странами.",
                'data' => [],
            ],
            '7' => [
                'text' => "ропишите в основном сидере сидер с для юзеров, сидер для городов и сидер для стран.",
                'data' => [],
            ],


        ];

        if ($getTask) {
            return array_keys($task);
        }
        return view('seeders.manual-seeder-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
    }
}
