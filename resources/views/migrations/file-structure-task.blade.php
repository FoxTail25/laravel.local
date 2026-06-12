<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
            <div>
                <b>
                    После этого необходимо запустить команду
                </b>
                <span style="color:red">
                    php artisan make:session-table
                </span>
                Эта команда создаст миграцию на создание таблицы сессий, которая необходима для запуска проекта
            </div>
        </div>
    @elseif($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <div>
                <pre>
                    php artisan make:migration сreate_users_table
                </pre>
            </div>
        </div>
    @endif
    <a href="/migrations/file-structure">Назад</a>

</x-layout>
