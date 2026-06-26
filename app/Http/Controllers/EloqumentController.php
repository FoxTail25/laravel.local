<?php

namespace App\Http\Controllers;

use App\Models\User;

class EloqumentController extends Controller
{
    public function createAndUse(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => 'С помощью artisan сгенерируйте модель для таблицы cities.',
                'data' => fn () => [],
            ],
            '2' => [
                'text' => 'Подключите модель Users к вашему контроллеру.',
                'data' => fn () => [],
            ],

        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('eloquent.create-and-use-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }

    public function getData(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => 'Получите всех юзеров.',
                'data' => fn () => [
                    'users' => $users = User::all(),
                    'fields' => $users->isNotEmpty() ? array_keys($users->first()->getAttributes()) : [],
                ],
            ],
            '2' => [
                'text' => 'Получите всех юзеров с возрастом 30. Передайте юзеров в представление и выведите их в виде HTML таблицы.',
                'data' => function () {
                    $users = User::where('age', 30)->get();
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
            '3' => [
                'text' => 'Получите всех юзеров с зарплатой от 1000 до 3000.',
                'data' => function () {
                    $users = User::whereBetween('salary', [1000, 3000])->orderBy('salary')->get();
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
            '4' => [
                'text' => 'Получите всех юзеров, начиная с четвертого.',
                'data' => function () {
                    $users = User::orderBy('id')->skip(3)->take(PHP_INT_MAX)->get();
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
            '5' => [
                'text' => 'Получите всех юзеров, начиная с четвертого.',
                'data' => function () {
                    $users = User::orderBy('id')->skip(3)->take(5)->get();
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
            '6' => [
                'text' => 'Получите всех юзеров с id, равным 1, 3, 4 или 5.',
                'data' => function () {
                    // $users = User::whereIn('id', [1, 3, 4, 5])->get();
                    $users = User::find([1, 3, 4, 5]);
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
            '7' => [
                'text' => 'Получите юзера с возрастом 30. Передайте его в представление. Выведите данные этого юзера в отдельных тегах.',
                'data' => function () {

                    $users = collect([User::where('age', 30)->first()])->filter();
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
            '8' => [
                'text' => 'Получите всех юзеров с возрастом 30. Передайте юзеров в представление и выведите их в виде HTML таблицы.',
                'data' => function () {

                    $users = $users = User::find(3);
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
            '9' => [
                'text' => 'Получите юзеров с id, равными 3, 4 и 5.',
                'data' => function () {

                    $users = $users = User::find([3, 4, 5]);
                    $fields = $users->isNotEmpty()
                        ? array_keys($users->first()->getAttributes())
                        : [];

                    return [
                        'users' => $users,
                        'fields' => $fields,
                    ];
                },
            ],
        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('eloquent.get-data-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }

    public function createUpdateDel(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => 'Добавьте нового юзера в вашу базу данных.',
                'data' => function () {
                    // узнаём сколько записей в базе данных
                    $totalUsers = User::count();
                    $newUserCount = $totalUsers + 1;
                    // создаём нового пользователя
                    $user = new User;
                    // прописываем его данные
                    $user->name = "UserName$newUserCount";
                    $user->email = "UserName$newUserCount@gmail.com";
                    $user->age = mt_rand(20, 50);
                    $user->salary = mt_rand(3000, 5000);
                    $user->city = mt_rand(1, 4);
                    // сохраняем нового пользователя в базу
                    $user->save();

                    return $newUserCount;

                },
            ],
            '2' => [
                'text' => 'Измените какого-нибудь юзера в вашей базе данных.',
                'data' => function () {
                    // получаем пользователя с id = 1
                    $user = User::find(1);
                    if ($user) {

                        // переписываем его данные
                        $newName = strrev($user->name);
                        $user->name = $newName;

                        // сохраняем нового пользователя в базу
                        $user->save();

                        return $newName;
                    } else {
                        return 'пользователя с id = 1 нет в базе';
                    }
                },
            ],
            '3' => [
                'text' => 'Удалите из базы пользователя с максимальным id',
                'data' => function () {
                    // получаем пользователя с максимальным id
                    $user = User::latest('id')->first();

                    if ($user) {
                        $id = $user->id;
                        $user->delete(); // Удалит юзера

                        return (int) $id; // вренёт id удалённого юзера
                    }

                    return 'в таблице users нет пользователей';
                },
            ],

        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('eloquent.create-update-del-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
}
