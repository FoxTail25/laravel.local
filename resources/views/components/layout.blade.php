<!DOCTYPE html>
<html lang="RU">

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
            max-width: 1024px;
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
        <nav class="navbar navbar-expand-md bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                blade
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Something else here
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/variables-attributes">
                                        Вывод переменных в
                                        атрибуты
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/arbitrary-code">
                                        Выполнение производного кода
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/arrays">
                                        Работа с массивами
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/variables-checking">
                                        Проверка переменных
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/unescaped-data-output">
                                        Вывод неэкранированных данных
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/conditions">
                                        Условия
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/foreach-directive">
                                        Циклы
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/php-code-block">
                                        Блок кода PHP
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/blade/blade-practicum">
                                        Практика
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/collections">Коллекции</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Миграции
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/migrations/intro">
                                        Введение
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/migrations/file-structure">
                                        Структура файлов
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/migrations/running">
                                        Запуск миграций
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/migrations/tables-fields">
                                        Колонки таблиц в миграциях
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/migrations/migration-fields">
                                        Изменения полей в миграциях
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/migrations/del-change-table">
                                        Удаление и переименование таблиц
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/migrations/migration-rollback">
                                        Отмена миграций
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Сидеры
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/seeders/intro">
                                        Введение
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/seeders/manual-seeder">
                                        Ручное заполнение
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Построитель запросов
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/DB/intro">
                                        Введение
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/records">
                                        Работа с записями
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/record-where">
                                        Выборка записей (where)
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/record-sort">
                                        Сортировка записей
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/insert-update-del">
                                        insert, update, delete, leftJoin
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Eloquent
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/eloquent/intro">
                                        Введение
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/records">
                                        Работа с записями
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/record-where">
                                        Выборка записей (where)
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/record-sort">
                                        Сортировка записей
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/DB/insert-update-del">
                                        insert, update, delete, leftJoin
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li> --}}
                    </ul>
                    {{-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> --}}
                </div>
            </div>
        </nav>
    </header>
    <hr />
    {{-- <h3>layout: Общий макет</h3> --}}
    <main>
        {{ $slot }}
    </main>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
