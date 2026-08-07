<x-layout>
    <x-slot:title>
        Контроллеры в Laravel
    </x-slot:title>
    <h2>
        Задачи на Controllers (Контроллеры) в Laravel
    </h2>
    <hr />
    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        Для выполнения этой задачи нам необходимо перейти в парку <b>app/Http/Comtrollers/</b> и внутри неё создать файл
        UserController.php
        <br />
        Внутри файла необходимо добавить вот такой код:
        <pre>&lt;?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function show()
    {
        return "Контроллер: UserController, действие show";
    }
}</pre>
        <br />
        <br />
        <a href="{{ route('controllers-fundamentals') }}#controllers_task1">Назад к задачам</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>
                Открываем файл <b>route/web.php</b>
            </li>
            <li>
                В самом верху строкой
                <pre>use App\Http\Controllers\UserController;</pre> добавляем импорт нашего контроллера.
            </li>
            <li>
                Добавляем роут для обработки нашего маршрута:
                <pre>Route::get('/user', [UserController::class, 'show']);</pre>
            </li>
        </ol>
        Пробуем перейти по адресу <a href="/user">/user</a>
        <br />
        <br />

        <a href="{{ route('controllers-fundamentals') }}#controllers_task2">Назад к задачам</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>
                Открываем файл <b>app\Http\Controllers\UserController.php</b>
            </li>
            <li>
                Сразу после метода show, добавляме метод all
                <pre>    public function all()
    {
        return "Контроллер: UserController, действие all";
    }</pre>
            </li>
            <li>
                Открываем файл <b>route/web.php</b>
            </li>
            <li>
                Добавляем роут для обработки нашего маршрута:
                <pre>Route::get('/controll/user/all', [UserController::class, 'all']);</pre>
            </li>
        </ol>
        Пробуем перейти по адресу <a href="/controll/user/all">/controll/user/all</a>
        <br />
        <br />

        <a href="{{ route('controllers-fundamentals') }}#controllers_task2">Назад к задачам</a>
    @elseif ($id == 4)
        <x-page.tasks.header :text="$text" />
        <pre>php artisan make:controller ArticleController</pre>
        <br />
        <br />
        <a href="{{ route('controllers-fundamentals') }}#controllers_task3">Назад к задачам</a>
    @elseif ($id == 5)
        <x-page.tasks.header :text="$text" />
        <pre>php artisan make:controller CategoryController</pre>
        <br />
        <br />
        <a href="{{ route('controllers-fundamentals') }}#controllers_task3">Назад к задачам</a>
    @elseif ($id == 6)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>
                Открываем файл <b>route/web.php</b>
            </li>
            <li>
                Если в самом верху нет такой строки:
                <pre>use App\Http\Controllers\UserController;</pre>
                То добавляем её.
            </li>
            <li>
                Добавляем роут для обработки нашего маршрута:
                <pre>Route::get('/controll/user/{name}', [UserController::class, 'name']);</pre>
            </li>
            <li>
                Далее переходим в наш UserController и добавляем в него метод:
                <pre>public function name($name)
    {
        return "name: $name";
    }</pre>
                <i>В зависимости от настройки. Ваша редактор кода может попросить указать тип переменной $name в таком
                    случае можно написать вот так <b>string $name</b></i>
            </li>
        </ol>
        Проверим что всё работает:
        <br />
        <a href="/controll/user/Dmitry">/controll/user/Dmitry</a><br />
        <a href="/controll/user/John">/controll/user/John</a>

        <br />
        <br />
        <a href="{{ route('controllers-fundamentals') }}#controllers_task4">Назад к задачам</a>
    @elseif ($id == 7)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>
                Открываем файл <b>route/web.php</b>
            </li>
            <li>
                Если в самом верху нет такой строки:
                <pre>use App\Http\Controllers\UserController;</pre>
                То добавляем её.
            </li>
            <li>
                Добавляем роут для обработки нашего маршрута:
                <pre>Route::get('/controll/user/{surname}/{name}', [UserController::class, 'surnameAndName']);</pre>
            </li>
            <li>
                Далее переходим в наш UserController и добавляем в него метод:
                <pre>public function surnameAndName(string $surname, string $name)
    {
        return "surname: $surname, name: $name";
    }</pre>
            </li>
        </ol>
        Проверим что всё работает:
        <br />
        <a href="/controll/user/Sharov/Dmitry">/controll/user/Sharov/Dmitry</a><br />
        <a href="/controll/user/Smit/John">/controll/user/Smit/John</a>

        <br />
        <br />
        <a href="{{ route('controllers-fundamentals') }}#controllers_task4">Назад к задачам</a>
    @elseif ($id == 8)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>
                Открываем файл <b>route/web.php</b>
            </li>
            <li>
                Если в самом верху нет такой строки:
                <pre>use App\Http\Controllers\UserController;</pre>
                То добавляем её.
            </li>
            <li>
                Добавляем роут для обработки нашего маршрута:
                <pre>Route::get('/controll/user-city/{user}', [UserController::class, 'userCity']);</pre>
            </li>
            <li>
                Далее переходим в наш UserController и добавляем в него метод:
                <pre>    public function userCity($user)
    {
        $users = [
            'user1' => 'city1',
            'user2' => 'city2',
            'user3' => 'city3',
            'user4' => 'city4',
            'user5' => 'city5',
        ];
        return $users[$user];
    }</pre>
            </li>
        </ol>
        Проверим что всё работает:
        <br />
        <a href="/controll/user-city/user1">/controll/user-city/user1</a><br />
        <a href="/controll/user-city/user5">/controll/user-city/user5</a><br />

        <br />
        <br />
        <a href="{{ route('controllers-fundamentals') }}#controllers_task5">Назад к задачам</a>
    @elseif ($id == 9)
        <x-page.tasks.header :text="$text" />
        <i>Можно модернизировать решение в прошлой задачи, но для закрепления навыков лучше сделаю всё заново</i>
        <ol>
            <li>
                Открываем файл <b>route/web.php</b>
            </li>
            <li>
                Если в самом верху нет такой строки:
                <pre>use App\Http\Controllers\UserController;</pre>
                То добавляем её.
            </li>
            <li>
                Добавляем роут для обработки нашего маршрута:
                <pre>Route::get('/controll/user-citysave/{user?}', [UserController::class, 'userCitySave']);</pre>
                сделаем так, что бы можно было даже не указывать имя.
            </li>
            <li>
                Далее переходим в наш UserController и добавляем в него метод:
                <pre>    public function userCity($user = null)
    {
        $users = [
            'user1' => 'city1',
            'user2' => 'city2',
            'user3' => 'city3',
            'user4' => 'city4',
            'user5' => 'city5',
        ];
        if(isset($users[$user])) {
            return $users[$user];
        } else {
            return 'запрошенные данные отсутствуют';
        }
    }</pre>
            </li>
        </ol>
        Проверим что всё работает:
        <br />
        <a href="/controll/user-citysave/user1">/controll/user-citysave/user1</a><br />
        <a href="/controll/user-citysave/user7">/controll/user-citysave/user7</a><br />
        <a href="/controll/user-citysave">/controll/user-citysave</a><br />

        <br />
        <br />
        <a href="{{ route('controllers-fundamentals') }}#controllers_task5">Назад к задачам</a>
    @endif
</x-layout>
