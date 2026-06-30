<x-layout>
    <x-slot:title>
        Связь один к многим в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <h5>
            cities
        </h5>
        <ul>
            <li>id</li>
            <li>name</li>
            <li>country_id</li>
        </ul>
        <h5>
            countries
        </h5>
        <ul>
            <li>id</li>
            <li>name</li>
        </ul>
        <pre>
    1) Создаём миграцю на создание таблицы cities
    php artisan make:migration create_cities
    В метод up прописываем следующий код:
    Schema::create('cities', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('country_id'); // country - в единственном числе!!!
        $table->timestamps();
    });
    2) Создаём миграцю на создание таблицы countries
    php artisan make:migration create_countries
    В метод up прописываем следующий код:
    Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    3) Запускаем миграции: php artisan migrate
        </pre>
        <a href="/relationship/one-to-many#task1">Назад</a>
    @endif
</x-layout>
