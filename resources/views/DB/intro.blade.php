<x-layout>
    <x-slot:title>
        QueryBuilder в Laravel
    </x-slot:title>

    <h3>
        Построитель запросов (QueryBuilder) в Laravel
    </h3>
    Как правило, при работе с фреймворками не требуется писать SQL запросы вручную. Обычно фреймворки предоставляют
    некий набор функций, с помощью которых можно работать с базой данных. В Laravel для работы с БД есть несколько
    разных способов. Самым базовым является использование построителя запросов (QueryBuilder, QB).
    <br />
    Построитель запросов позволяет отправлять запросы к базе, используя PHP команды, избавляя программиста от написания
    сырого SQL. При этом построитель запросов защищает ваш код от инъекций и вам нет необходимости экранировать строки
    перед их передачей в запрос.
    <br />
    Построитель запросов представляет собой фасад с именем DB (Illuminate\Support\Facades\DB;). Подключим его к
    контроллеру:
    <pre>&lt;?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB; // подключаем фасад DB

    class UserController extends Controller
    {
        //
    }</pre>

    <x-page.content.task.head :data="['qb-intro_task', 'Задача:']" />
    <x-page.content.task.body href='qb-intro-task' :tasks="[
        1 => [
            'text' => 'Подключите фасад DB к контроллеру юзеров.',
        ],
    ]" />
    <br />
    <br />

</x-layout>
