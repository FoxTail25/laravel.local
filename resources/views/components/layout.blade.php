<!DOCTYPE html>
<html lang="RU">

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>{{ isset($title) ? $title : 'Laravel' }}</title>
    <style>

    </style>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                                    <a class="dropdown-item" href="/eloquent/create-and-use">
                                        Создание и использование
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/eloquent/get-data">
                                        Получение данных
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/eloquent/create-update-del">
                                        Create, update, del
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/relationship/intro">
                                        Связи введение
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/relationship/one-to-one">
                                        Связь один к одному
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/relationship/one-to-many">
                                        Связь один ко многим
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/relationship/many-to-many">
                                        Связь многие ко многим
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
