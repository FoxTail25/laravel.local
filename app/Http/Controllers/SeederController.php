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


        ];

        if ($getTask) {
            return array_keys($task);
        }
        return view('seeders.manual-seeder-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
    }
}
