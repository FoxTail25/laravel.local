<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        Заходим в папку database/migrations и удаляем оттуда все файлы миграций.
        <b>
            После этого, в терминале, необходимо выполнить команду
        </b>
        <span style="color:red">
            php artisan make:session-table
        </span>
        Эта команда создаст миграцию на создание таблицы сессий, которая необходима для запуска проекта
    @elseif($id == 2)
        <x-page.tasks.header :text="$text" />
        <pre>php artisan make:migration сreate_users_table</pre>
    @endif
    <br />
    <br />
    <a href="{{ route('migration-file-structure') }}#migrations_task1">Назад к задачам</a>

</x-layout>
