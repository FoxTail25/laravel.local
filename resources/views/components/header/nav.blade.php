<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-wrap justify-content-center">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Маршруты (Routes)
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('routes-intro') }}">
                                Основы
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="advanced_section">
                            <a class="dropdown-item" href="{{ route('routes-advanced') }}">
                                Продвинутый
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{ route('controllers-fundamentals') }}">Контроллеры (Controllers)</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Представления (view) и blade
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('views-base') }}">
                                View
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="/blade/fundamentals">
                                Основы
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
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="advanced_section">
                            <a class="dropdown-item" href="/blade/components">
                                Компоненты
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
                            <a class="dropdown-item" href="{{ route('migration-intro') }}">
                                Введение
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('migration-file-structure') }}">
                                Структура файлов
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('migration-running') }}">
                                Запуск миграций
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('migration-tables-fields') }}">
                                Колонки таблиц в миграциях
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('migration-fields') }}">
                                Изменения полей в миграциях
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('del-change-table') }}">
                                Удаление и переименование таблиц
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('migration-rollback') }}">
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
                            <a class="dropdown-item" href="{{ route('seeder-intro') }}">
                                Введение
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('manual-seeder') }}">
                                Ручное заполнение
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Построитель запросов (QueryBuilder)
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('qb-intro') }}">
                                Введение
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('qb-record') }}">
                                Работа с записями
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('qb-record-where') }}">
                                Выборка записей (where)
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('qb-record-sort') }}">
                                Сортировка записей
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('qb-insert-update-del') }}">
                                insert, update, delete, leftJoin
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Eloquent
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('eloquent-intro') }}">
                                Введение
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('create-and-use') }}">
                                Создание и использование
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('eloquent-get-data') }}">
                                Получение данных
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('eloquent-create-update-del') }}">
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
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="/relationship/load">
                                Ленивая и жадная загрузки
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Формы
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/form/object-request">
                                Объект Request в Laravel
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="/form/object-request-method">
                                методы request
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/pagination/intro">Пагинация</a>
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
