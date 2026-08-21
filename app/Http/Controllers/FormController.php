<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function objectRequest(Request $request, int $id){
          $tasks = [
            '1' => [
                'data' => function(){
                    return null;
                },
            ],
            '2' => [
                'data' => function() use ($request){
                // Проверяем, что форма была отправлена (хотя бы один инпут заполнен)
                if ($request->hasAny(['inp1', 'inp2', 'inp3'])) {
                    $inp1 = (int)$request->input('inp1', 0);
                    $inp2 = (int)$request->input('inp2', 0);
                    $inp3 = (int)$request->input('inp3', 0);

                        return $inp1 + $inp2 + $inp3;
                    }
                    return null; // Форма еще не отправлялась
                },
            ],
            '3' => [
                'data' => function() use ($request){
                // $request->filled('name') — возвращает true, если поле присутствует и не является пустым.
                if ($request->filled(['name', 'age', 'salary'])) {
                    $name = (string)$request->input('name');
                    $age = (string)$request->input('age');
                    $salary = (string)$request->input('salary');

                        return "Здравствуйте $name! Ваш возраст: $age, Ваша заплата: $salary";
                    }
                    return null; // Форма еще не отправлялась
                },
            ],
            '4' => [
                'data' => function() use ($request){
                // $request->filled('name') — возвращает true, если поле присутствует и не является пустым.
                if ($request->filled(['country', 'city'])) {
                    $country = (string)$request->input('country');
                    $city = (string)$request->input('city');

                        return ['country'=> $country, 'city'=> $city];
                    }
                    return null; // Форма еще не отправлялась
                },
            ],
            '5' => [

                'data' => function() use ($request){
                if ($request->hasAny(['inp1', 'inp2','inp3'])) {
                    // $request->all() возвращает все данные формы в виде массива
                    return $request->all();
                    }
                    return null; // Форма еще не отправлялась
                },
            ],
            '6' => [
                'data' => function() use ($request){
                if ($request->hasAny(['name', 'login'])) {
                    return $request->only('name', 'login');
                    }
                    return null; // Форма еще не отправлялась
                },
            ],
            '7' => [
                'data' => function() use ($request){
                if ($request->hasAny(['name', 'login'])) {
                    return $request->except('email', 'password');
                    }
                    return null; // Форма еще не отправлялась
                },
            ],
            // '8' => [
            //     'data' => function() use ($request){
            //     if ($request->hasAny(['name', 'login'])) {
            //         return $request->except('email', 'password');
            //         }
            //         return null; // Форма еще не отправлялась
            //     },
            // ],

        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('form.object-request-task', [
            'id' => $id,
            'text' => $request->text,
            'data' => $resultData
        ]);

    }
        public function objectRequestMethod(Request $request, int $id){
          $tasks = [
            '1' => [
                'data' => fn() => $request->path()
            ],
            '2' => [
                'data' => fn() => $request->url()
            ],
            '3' => [
                'data' => fn() => $request->fullUrl()
            ],
        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('form.object-request-method-task', [
            'id' => $id,
            'text' => $request->text,
            'data' => $resultData
        ]);

    }
}
