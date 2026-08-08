<x-layout>
    <x-slot:title>
        Представления в Laravel
    </x-slot:title>
    <h2>
        Задачи на Views (Представления) в Laravel
    </h2>
    <hr />
    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>
                Сначал создадим контроллер:
                <pre>php artisan make:controller ViewController</pre>
            </li>
            <li>
                Далее в этом контроллере создадим метод task1, который будет возвращать наше представление
                <pre>public function task1()
    {
        return view('view.task1');
    }</pre>
            </li>
            <li>
                Далее создадим само представление. resources/views/view/task1.blade.php
                В созданный файл записываем HTML-разметку:
                <pre>&lt;h1>Hello world!&lt;/h1></pre>
            </li>
            <li>
                В файл route/web.php добавляем роут для нашего контроллера:
                <pre>Route::get('/views-test/1', [ViewController::class, 'task1'])</pre>
            </li>
        </ol>
        <h5>Результат</h5>
        Проверяем что всё работает<a href="/views/views-test/1">/views/views-test/1</a>
        <br />
        <br />

        <a href="{{ route('views-base') }}#views_task1">Назад к задачам</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        {{-- <i>Для краткости, я более не буду расписывать все действия как делал это в прошлой задае</i> --}}
        Код в контроллере:
        <pre>public function methodName()
    {
        return view('viewName', ['name' => 'John', 'surname' => 'Smit']);
    }</pre>
        Код в представлении:
        <pre>Name: &#123;&#123; $name }}&lt;br/>
Surname: &#123;&#123; $surname }}</pre>
        <h5>Результат</h5>
        Name: {{ $data['name'] }}<br />
        Name: {{ $data['surname'] }}
        <br />
        <br />

        <a href="{{ route('views-base') }}#views_task2">Назад к задачам</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />

        Код в представлении:
        <pre>//path: resoutces/views/components/layout.blade.php

        &lt;!DOCTYPE html>
        &lt;html lang="en">
        &lt;head>
            &lt;meta charset="UTF-8">
            &lt;meta name="viewport" content="width=device-width, initial-scale=1.0">
            &lt;meta http-equiv="X-UA-Compatible" content="ie=edge">
            &lt;title>Document&lt;/title>
        &lt;/head>
        &lt;body>
            &#123;&#123; $slot }}
        &lt;/body>
        &lt;/html></pre>

        <br />
        <br />

        <a href="{{ route('views-base') }}#views_task3">Назад к задачам</a>
    @elseif ($id == 4)
        <x-page.tasks.header :text="$text" />

        Код в контроллере UserController:
        <pre>&lt;?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function show()
    {
        return viev('user.show');
    }
}</pre>
        Код в представлении:
        <pre>//path: resources/views/user/show.blade.php

        &lt;h2>Это представление show, контроллера UserControlle&lt;/h2></pre>
        <br />
        <br />

        <a href="{{ route('views-base') }}#views_task4">Назад к задачам</a>
    @elseif ($id == 5)
        <x-page.tasks.header :text="$text" />

        Код в контроллере UserController:
        <pre>&lt;?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function show()
    {
        return viev('user.show');
    }
}</pre>
        Код в представлении:
        <pre>//path: resources/views/user/show.blade.php
    &lt;x-layout>
    &lt;h2>Это представление show, контроллера UserControlle&lt;/h2>
    &lt;/x-layout></pre>
        <br />
        <br />

        <a href="{{ route('views-base') }}#views_task4">Назад к задачам</a>
    @elseif ($id == 6)
        <x-page.tasks.header :text="$text" />

        В контроллер App\Http\Controllers\UserController.php добавляем 3 метода:
        <pre>   public function viewOne()
    {
        return view('user.viewOne', ['title' => 'title vievOne', 'content' => 'content viewOne']);
    }
    public function viewTwo()
    {
        return view('user.viewTwo', ['title' => 'title vievTwo', 'content' => 'content viewTwo']);
    }
    public function viewThree()
    {
        return view('user.viewThree', ['title' => 'title vievThree', 'content' => 'content viewThree']);
    }</pre>
        Созадаём лайаоут для наших представлений //path: resources/components/education/user-layout.blade.php
        <pre>&lt;!DOCTYPE html>
&lt;html lang="ru">

&lt;head>
    &lt;title>&#123;&#123; $title }}&lt;/title>
&lt;/head>

&lt;body>
    &#123;&#123; $slot }}
&lt;/body>

&lt;/html></pre>
        В папке resources/views/user делаем 3 файла:
        <ol>
            <li>
                <pre>//path: resources/views/user/viewOne.blade.php
&lt;x-education.user-layout>
    &lt;x-slot:title>
        &#123;&#123; $title }}
    &lt;/x-slot>
    &lt;h4>view: user.vievOne.blade.php&lt;/h4>
    &#123;&#123; $content }}
&lt;/x-education.user-layout></pre>
            </li>
            <br />
            <li>
                <pre>//path: resources/views/user/viewTwo.blade.php
&lt;x-education.user-layout>
    &lt;x-slot:title>
        &#123;&#123; $title }}
    &lt;/x-slot>
    &lt;h4>view: user.vievTwo.blade.php&lt;/h4>
    &#123;&#123; $content }}
&lt;/x-education.user-layout></pre>
            </li>
            <br />
            <li>
                <pre>//path: resources/views/user/viewThree.blade.php
&lt;x-education.user-layout>
    &lt;x-slot:title>
        &#123;&#123; $title }}
    &lt;/x-slot>
    &lt;h4>view: user.vievThree.blade.php&lt;/h4>
    &#123;&#123; $content }}
&lt;/x-education.user-layout></pre>
            </li>
        </ol>
        Теперь осталось добавить маршруты в файл routes/web.php
        <pre>Route::get('/view/viewOne', [UserController::class, 'viewOne']);
Route::get('/view/viewTwo', [UserController::class, 'viewTwo']);
Route::get('/view/viewThree', [UserController::class, 'viewThree']);</pre>
        <br />
        <a href="/view/viewOne">/view/viewOne</a><br />
        <a href="/view/viewTwo">/view/viewTwo</a><br />
        <a href="/view/viewThree">/view/viewThree</a>
        <br />
        <br />
        <br />

        <a href="{{ route('views-base') }}#views_task5">Назад к задачам</a>
    @endif
</x-layout>
