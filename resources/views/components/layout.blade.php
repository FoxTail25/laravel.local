<!DOCTYPE html>
<html lang="RU">

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ isset($title) ? $title : 'Laravel' }}</title>
    <style>
        table {
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 16px;
            text-align: left;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        tbody {
            background-color: #f1f3f5;
            cursor: pointer;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
            color: #333333
        }

        .active {
            color: green;
        }

        nav>ul>li {
            display: inline;
        }

        body {
            max-width: 800px;
            margin: 0 auto;
        }

        html {
            scroll-behavior: smooth;
        }

        pre,
        code {
            background: rgb(245, 245, 245);
            padding: 10px;
            border-radius: 10px;
        }

        li>code {
            padding: 2px;
            border-radius: 10px;
            line-height: 22px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            {{-- @php
        $fileDir = __DIR__;
        $publicDir = $_SERVER['DOCUMENT_ROOT'];
        $path = $publicDir . '../../routes/web.php';
        $str = file_get_contents($path);

        $reg = '#(/blade/.*/)(\'\S)#';

        preg_match_all($reg, $str, $res);

    @endphp
    <a href="/">home</a>
    @foreach ($res[1] as $link)
        <a href="{{ $link }}">{{ $loop->iteration }} {{ trim(mb_substr($link, 7), '/') }}</a>
    @endforeach --}}
            <ul>
                <li><a href="/">Главная</a></li>
            </ul>
            <hr />
            <h5>blade</h5>
            <ul>
                <li><a href="/blade/variables-attributes">Вывод переменных в атрибуты</a></li>
                <li><a href="/blade/arbitrary-code">Выполнение производного кода</a></li>
                <li><a href="/blade/arrays">Работа с массивами</a></li>
                <li><a href="/blade/variables-checking">Проверка переменных</a></li>
                <li><a href="/blade/unescaped-data-output">Вывод неэкранированных данных</a></li>
                <li><a href="/blade/conditions">Условия</a></li>
                <li><a href="/blade/foreach-directive">Циклы</a></li>
                <li><a href="/blade/php-code-block">Блок кода PHP</a></li>
                <li><a href="/blade/blade-practicum">Практика</a></li>
            </ul>
            <hr />
            <ul>
                <li><a href="/collections">Коллекции</a></li>
            </ul>
            <hr />
            <h5>Миграции</h5>
            <ul>
                <li><a href="/migrations/intro">Введение</a></li>
                <li><a href="/migrations/file-structure">Структура файлов</a></li>
                <li><a href="/migrations/running">Запуск миграций</a></li>
                <li><a href="/migrations/tables-fields">Колонки таблиц в миграциях</a></li>
                <li><a href="/migrations/migration-fields">Изменения полей в миграциях</a></li>
                <li><a href="/migrations/del-change-table">Удаление и переименование таблиц</a></li>
                <li><a href="/migrations/migration-rollback">Отмена миграций</a></li>
            </ul>
            <hr />
            <h5>Сидеры</h5>
            <ul>
                <li><a href="/seeders/intro">Введение</a></li>
                <li><a href="/seeders/manual-seeder">Ручное заполнение</a></li>
            </ul>
        </nav>
        <hr />
    </header>
    {{-- <h3>layout: Общий макет</h3> --}}
    <main>
        {{ $slot }}
    </main>
</body>

</html>
