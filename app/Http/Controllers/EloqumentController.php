<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Profession;
use App\Models\Profile;
use App\Models\User;
use App\Models\User_r;

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
            '4' => [
                'text' => 'Удалите юзера с максимальным id.',
                'data' => function () {
                    // Получаем ID последнего пользователя.
                    // Если пользователей нет, запишется null
                    $id = User::latest('id')->first()?->id;

                    if ($id) {

                        User::destroy($id); // Удалит юзера

                        return (int) $id; // вренёт id удалённого юзера
                    }

                    return 'в таблице users нет пользователей';
                },
            ],
            '5' => [
                'text' => 'Удалите юзера с максимальным id.',
                'data' => function () {
                    // Получаем ID 3 последних пользователей в виде коллекции [5, 4, 3]
                    $ids = User::latest('id')->take(3)->pluck('id');

                    if ($ids->isNotEmpty()) {
                        // Передаем всю коллекцию в destroy()
                        User::destroy($ids);

                        return $ids; // вренёт id удалённого юзера
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

    public function oneToOne(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => 'Сделайте следующие таблицы:',
                'data' => fn () => [],
            ],
            '2' => [
                'text' => 'Свяжите эти таблицы отношением hasOne.',
                'data' => fn () => [],
            ],
            '3' => [
                'text' => 'Напишите сидер для заполнения данных в таблицах user_r и profile. И заполните их.',
                'data' => fn () => [],
            ],
            '4' => [
                'text' => 'Получите какого-нибудь юзера вместе с его профилем.',
                'data' => function () {
                    $user = User_r::find(1, ['id', 'login']);
                    if ($user) {

                        $profile = ($user->profile)->only(['name', 'surname', 'email']);
                        $user = $user->only(['id', 'login']);
                        $mergedUser = array_merge($user, $profile);

                        return ['users' => [$mergedUser], 'fields' => array_keys($mergedUser)];
                    } else {
                        return 'По такому запросу пользователей нет';
                    }
                },
            ],
            '5' => [
                'text' => 'Получите всех пользователей вместе с их профилями, передайте их в представление и выведите на экран в виде HTML таблицы.',
                'data' => function () {
                    // 1. Загружаем пользователей и нужные поля профиля
                    $users = User_r::with('profile:user_id,name,surname,email')->get(['id', 'login']);
                    // Если пользователей вообще нет в базе — возвращаем пустую структуру
                    if ($users->isEmpty()) {
                        return ['users' => [], 'fields' => []];
                    }
                    // 2. Преобразуем каждого пользователя в плоский массив
                    $usersArray = $users->map(function ($user) {
                        return [
                            'id' => $user->id,
                            'login' => $user->login,
                            'name' => $user->profile?->name,
                            'surname' => $user->profile?->surname,
                            'email' => $user->profile?->email,
                        ];
                    })->toArray();
                    // 3. Динамически берем ключи (поля) из первого найденного пользователя
                    $fields = array_keys($usersArray[0]);

                    return [
                        'users' => $usersArray,
                        'fields' => $fields,
                    ];
                },
            ],
            '6' => [
                'text' => 'Свяжите таблицы с юзерами и профилями отношением belongsTo.',
                'data' => function () {
                    return [];
                },
            ],
            '7' => [
                'text' => 'Получите профиль вместе с его юзером.',
                'data' => function () {
                    $profile = Profile::find(1);
                    $user = $profile->user_r;

                    $profile = $profile->only(['name', 'surname', 'email']);
                    $user = $user->only(['login']);
                    $mergedUser = array_merge($profile, $user);

                    return ['users' => [$mergedUser], 'fields' => array_keys($mergedUser)];
                },
            ],
            '8' => [
                'text' => 'Получите все профили вместе с их юзерами. Выведите их в представлении в виде HTML таблицы.',
                'data' => function () {
                    // 1. Загружаем пользователей и нужные поля профиля
                    $profilesCollection = Profile::with('user_r:id,login')->get(['user_id', 'name', 'surname', 'email']);
                    // 2. Если пользователей нет, то вернётся пустой массив.
                    if ($profilesCollection->isEmpty()) {
                        return ['users' => [], 'fields' => []];
                    }
                    // 3. Преобразуем коллекцию
                    $usersArray = $profilesCollection->map(function ($profile) {
                        return [
                            'login' => $profile->user_r?->login,
                            'name' => $profile->name,
                            'surname' => $profile->surname,
                            'email' => $profile->email,
                        ];
                    })->toArray();
                    // 4. Динамически берем ключи (поля) из первого найденного пользователя
                    $fields = array_keys($usersArray[0]);

                    return ['users' => $usersArray, 'fields' => $fields];
                },
            ],
        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('relationship.one-to-one-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }

    public function oneToMany(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => 'Сделайте следующие таблицы:',
                'data' => fn () => [],
            ],
            '2' => [
                'text' => 'Свяжите таблицу countries с таблицей cities отношением hasMany.',
                'data' => fn () => [],
            ],
            '3' => [
                'text' => 'Для таблиц, созданных в предыдущем уроке получите все страны вместе с их городами.',
                'data' => function () {
                    $countries = Country::all();

                    return $countries;
                },
            ],
            '4' => [
                'text' => 'Добавьте поле population в таблицу cities и заполните рандомным числом от 80 000 до 120 000',
                'data' => function () {
                    $countries = Country::all();

                    return $countries;
                },
            ],
            '5' => [
                'text' => 'Получите все страны вместе с их городами, население в которых больше 100 тысяч.',
                'data' => function () {
                    // 1. Получаем все страны
                    $countries = Country::all();
                    $result = [];

                    // 2. Перебираем каждую страну в цикле
                    foreach ($countries as $country) {

                        $largeCities = $country->cities()
                            ->select('name', 'population')
                            ->where('population', '>', 100000)
                            ->get();
                        // 3. Если в стране есть города > 100000
                        if ($largeCities->isNotEmpty()) {
                            $result[$country->name] = $largeCities;
                        }
                    }

                    return $result;
                },
            ],
            '6' => [
                'text' => 'Получите все страны вместе с их городами, население в которых больше 100 тысяч.',
                'data' => function () {
                    // 1. Получаем все страны
                    $countries = Country::all();
                    $result = [];

                    // 2. Перебираем каждую страну в цикле
                    foreach ($countries as $country) {

                        $result[$country->name] = $country->cities()
                            ->select('country_id', 'name', 'population')
                            // 3. Сортируем по полю population
                            ->orderBy('population')
                            ->get();
                    }

                    return $result;
                },
            ],
            '7' => [
                'text' => 'Свяжите таблицу cities с таблицей countries отношением belongsTo.',
                'data' => function () {
                    // 1. Получаем все страны
                    $countries = Country::all();
                    $result = [];

                    // 2. Перебираем каждую страну в цикле
                    foreach ($countries as $country) {

                        $result[$country->name] = $country->cities()
                            ->select('country_id', 'name', 'population')
                            // 3. Сортируем по полю population
                            ->orderBy('population')
                            ->get();
                    }

                    return $result;
                },
            ],
            '8' => [
                'text' => 'Получите город вместе с его страной.',
                'data' => function () {
                    // 1. Узнаём количество записей в таблице cities
                    $count = City::count();
                    // 2. Получаем один рандомный город
                    $city = $count > 0 ? City::skip(rand(0, $count - 1))->first() : null;

                    return $city;
                },
            ],
            '9' => [
                'text' => 'Получите все города вместе с их странами.',
                'data' => function () {
                    // 1. Получаем все города
                    $cities = City::All();

                    return $cities;
                },
            ],
            '10' => [
                'text' => 'Получите все города вместе с их странами.',
                'data' => function () {
                    // 1. Получаем все города
                    $cities = City::where('population', '>', 100000)->get();

                    return $cities;
                },
            ],
            '11' => [
                'text' => 'сделайте (и заполните) следующие таблицы:',
                'data' => function () {
                    return [];
                },
            ],
            '12' => [
                'text' => 'Свяжите "сотрудника" (employee) с его городом и с его должностью отношением belongsTo.',
                'data' => function () {
                    return [];
                },
            ],
            '13' => [
                'text' => 'Получите сотрудника вместе с его городом и должностью.',
                'data' => function () {
                    // узнаём количество записей в таблице employees:
                    $count = Employee::count();

                    // возвращаем рандомного сотрудника в представелние
                    return $count > 0 ? Employee::skip(rand(0, $count - 1))->first() : null;
                },
            ],
        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('relationship.one-to-many-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }

    public function manyToMany(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => 'Таблица employee у нас уже есть. Теперь нам нужно создать таблицу professions и таблицу связи. А так же заполнить их данными.',
                'data' => fn () => [],
            ],
            '2' => [
                'text' => 'Получите всех сотрудников вместе с их профессиями.',
                'data' => function() {
                    $employees = Employee::all();
                    return $employees;
                },
            ],
            '3' => [
                'text' => 'Получите всех профессии вместе с сотрудниками, которые ими владеют',
                'data' => function() {
                    $professions = Profession::all();
                    return $professions;
                },
            ],

        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('relationship.many-to-many-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }

    public function load(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => 'Выберите несколько задач из предыдущих уроков и переделайте их код на жадную загрузку.',
                'data' => function(){
                    $professions = Profession::with(['employees'])->get();
                    return $professions;
                },
            ],
        ];

        // Проверка безопасности: если передали несуществующий ID задачи
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('relationship.load-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
}
