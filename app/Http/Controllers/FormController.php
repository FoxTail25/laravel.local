<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function objectRequest(Request $request, int $id){
          $tasks = [
            '1' => [
                'text' => 'Внедрите объект запроса в действие вашего контроллера.',
                'data' => function(){
                    return null;
                },
            ],
            '2' => [
                'text' => 'Сделайте форму с тремя инпутами, в которые будут вводиться числа. После отправки формы найдите сумму введенных
        чисел и передайте ее в представление.',
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
                'text' => 'Сделайте форму с тремя инпутами, в которые будут вводиться числа. После отправки формы найдите сумму введенных
        чисел и передайте ее в представление.',
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
                'text' => 'С помощью формы спросите у пользователя его город и страну. После отправки формы выведите эти данные над формой
        в отдельном абзаце.',
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
                'text' => 'Пусть в вашей форме есть произвольное количество инпутов. После отправки формы получите массив отправленных
        значений, отправьте его в представление и выведите эти данные в виде списка ul.',
                'data' => function() use ($request){
                // $request->filled('name') — возвращает true, если поле присутствует и не является пустым.
                if ($request->hasAny(['inp1', 'inp2','inp3'])) {
                        return $request->all();
                    }
                    return null; // Форма еще не отправлялась
                },
            ],

        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('form.object-request-task', [
            'id' => $id,
            'text' => $tasks[$id]['text'],
            'data' => $resultData
        ]);

    }
}
