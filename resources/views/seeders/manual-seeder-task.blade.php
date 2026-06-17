<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'user1',
                'surname' => 'sur1',
                'email' => 'ema1@mail.ru'
            ],
            [
                'name' => 'user2',
                'surname' => 'sur2',
                'email' => 'ema2@mail.ru'
            ],
            [
                'name' => 'user3',
                'surname' => 'sur3',
                'email' => 'ema3@mail.ru'
            ],
        ]);
    }
}</pre>
        </div>
    @elseif ($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert($this->getRendomUser(10));
    }
    public function getRendomUser(int $cycles)
    {
        $resultArr = [];
        for ($i = 1; $i <= $cycles; $i++) {
            $resultArr[] = [
                'name' => 'userName'.$i,
                'surname' => Str::random(7),
                'email' => Str::random(5) . '@mail.ru',
                'created_at'=> now() // результат функции time() вызовет ошибку при записи в БД
            ];
        }
        return $resultArr;
    }
}</pre>
        </div>
    @elseif ($id == 3)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UserSeeder
     */
    public function run(): void
    {
        // Передаем 10 для генерации
        DB::table('users')->insert($this->getRandomUser(10));
    }
    /**
     * Генерирует массив случайных пользователей
     */
    public function getRandomUser(int $cycles): array
    {
        $resultArr = [];
        $passwordHash = Hash::make('12345'); // Хэшируем ОДИН раз за пределами цикла для экономии процессора
        $currentTime = now(); // Настоящее дата - время

        for ($i = 1; $i <= $cycles; $i++) {

            $email = Str::random(10) . '@mail.ru'; // Генерируем рандомный емаил

            $resultArr[] = [
                'name' => Str::random(5),
                'surname' => Str::random(7),
                'email' => $email,
                'password' => $passwordHash,
                'created_at' => $currentTime,
                'updated_at' => $currentTime, // Заполняем оба таймстампа
            ];
        }
        return $resultArr;
    }
}</pre>
        </div>
    @elseif ($id == 4)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>php artisan make:seeder UserSeeder</pre>
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UserSeeder
     */
    public function run(): void
    {
        // Передаем 10 для генерации
        DB::table('users')->insert($this->getRandomUser(10));
    }
    /**
     * Генерирует массив случайных пользователей
     */
    public function getRandomUser(int $cycles): array
    {
        $resultArr = [];
        $passwordHash = Hash::make('12345'); // Хэшируем ОДИН раз за пределами цикла для экономии процессора
        $currentTime = now(); // Настоящее дата - время

        for ($i = 1; $i <= $cycles; $i++) {

            $email = Str::random(10) . '@mail.ru'; // Генерируем рандомный емаил

            $resultArr[] = [
                'name' => Str::random(5),
                'surname' => Str::random(7),
                'email' => $email,
                'password' => $passwordHash,
                'created_at' => $currentTime,
                'updated_at' => $currentTime, // Заполняем оба таймстампа
            ];
        }
        return $resultArr;
    }
}</pre>
        </div>
    @elseif ($id == 5)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>php artisan make:seeder CitySeeder</pre>
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CitySeeder
     */
    public function run(): void
    {
        // Передаем 10 для генерации
        DB::table('citys')->insert($this->getRandomCity(10));
    }
    /**
     * Генерирует массив случайных пользователей
     */
    public function getRandomCity(int $cycles): array
    {
        $resultArr = [];
        $currentTime = now(); // Настоящее дата - время

        for ($i = 1; $i <= $cycles; $i++) {

            $resultArr[] = [
                'name' => Str::random(5),
                'created_at' => $currentTime,
                'updated_at' => $currentTime, // Заполняем оба таймстампа
            ];
        }
        return $resultArr;
    }
}</pre>
        </div>
    @elseif ($id == 6)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>php artisan make:seeder CountrySeeder</pre>
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CountrySeeder
     */
    public function run(): void
    {
        // Передаем 10 для генерации
        DB::table('countrys')->insert($this->getRandomCountry(10));
    }
    /**
     * Генерирует массив случайных пользователей
     */
    public function getRandomCountry(int $cycles): array
    {
        $resultArr = [];
        $passwordHash = Hash::make('12345'); // Хэшируем ОДИН раз за пределами цикла для экономии процессора
        $currentTime = now(); // Настоящее дата - время

        for ($i = 1; $i <= $cycles; $i++) {

            $resultArr[] = [
                'name' => Str::random(5),
                'created_at' => $currentTime,
                'updated_at' => $currentTime, // Заполняем оба таймстампа
            ];
        }
        return $resultArr;
    }
}</pre>
        </div>
    @elseif ($id == 7)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>php artisan make:seeder CountrySeeder</pre>
            <pre>
&lt;?php

namespace Database\Seeders;

use UserSeeder;
use CitySeeder;
use CountrySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CitySeeder::class,
            CountrySeeder::class,
        ]);
    }
}</pre>
        </div>
    @elseif ($id == 8)
        <div>
            <p>
                {{ $text }}
            </p>
            <div style="border: 1px solid gray; padding:10px; margin:10px;">

                <h5 style="text-align: center">posts</h5>
                <ul>
                    <li>id</li>
                    <li>title(varchr)</li>
                    <li>slug(varchr)</li>
                    <li>likes(integer)</li>
                    <li>created_at(datetime)</li>
                    <li>updated_at(datetime)</li>
                </ul>
            </div>
            <div style="border: 1px solid gray; padding:10px; margin:10px;">
                <h5 style="text-align: center">users</h5>
                <ul>
                    <li>id</li>
                    <li>name(varchr)</li>
                    <li>email(varchr)</li>
                    <li>age(integer)</li>
                    <li>salary(integer)</li>
                    <li>created_at(datetime)</li>
                    <li>updated_at(datetime)</li>
                </ul>
            </div>
            1) Отменим все миграции которые были до этого момента:
            <pre>php artisan migrate:rollback</pre>
            2) Зайдем в папку миграций database/migration и удалим все файлы которые там есть. Далее, что бы laravel
            запустился, ему нужна таблица сессий (по умолчнию, все сесси хранятся в таблице БД. Если этой таблицы нет.
            То фреймвор выдаст ошибку)
            <pre>php artisan session:table</pre>
            3) Теперь создаём миграцию на создание таблицы posts
            <pre>php artisan make:migration create_posts_table</pre>
            Зайдем в папку миграций database/migration найдём нашу миграцию ....create_posts_table и допишем в метод up
            следующий код:
            <pre>
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->integer('likes');
            $table->timestamps();
        });
    }</pre>
            теперь создаём миграцию на создание таблицы users:
            <pre>php artisan make:migration create_users_table</pre>
            Зайдем в папку миграций database/migration найдём нашу миграцию ....create_users_table и допишем в метод up
            следующий код:
            <pre>
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('age');
            $table->integer('salary');
            $table->timestamps();
        });
    }</pre>
            Теперь нам надо зайти в папку database/seeders и удалить все сидеры, кроме основного
            (DatabaseSeeder.php). Далее создаём seeder для наполнения таблицы posts
            <pre>php artisan make:seeder PostSeeder</pre>
            Заходим в файл database/seeders/PostSeeder.php и дописываем что бы в итоге получилось так:
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Добавляем посты в таблицу
        DB::table('posts')->insert($this->getRandomPost(10));
    }
    public function getRandomPost(int $ciclys): array
    {
        // Функция для создания фейковых постов.
        $resultArr = [];
        $curretTime = now();

        for ($i = 1; $i <= $ciclys; $i++) {
            $resultArr[] = [
                'title' => Str::random(5),
                'slug' => Str::random(7),
                'likes' => 0,
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ];
        }

        return $resultArr;
    }
}</pre>
            Создаём seeder для пользователей:
            <pre>php artisan make:seeder UserSeeder</pre>
            Заходим в файл database/seeders/UserSeeder.php и дополняем его содержимое что бы в результате получилось
            так:
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Добавляем пользователей в таблицу
        DB::table('users')->insert($this->getRandomUser(10));
    }
    public function getRandomUser(int $ciclys): array
    {
        // Функция для создания фейковых пользователей.
        $resultArr = [];
        $curretTime = now();

        for ($i = 1; $i <= $ciclys; $i++) {
            $resultArr[] = [
                'name' => Str::random(5),
                'email' => Str::random(10) . '@gmail.com',
                'age' => mt_rand(10, 30), // рандомное значение от 10 до 30
                'salary' => mt_rand(1000, 3000), // рандомное значение от 1000 до 3000
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ];
        }

        return $resultArr;
    }
}</pre>
            Теперь прописываем наши сидоры в главном файле database/seeders/DatabaseSeeder.php
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
/* Я думал что так работать не будет.
 * Т.к. я не указал что заюзаю классы UserSeeder и PostSeeder
*/ Но на удивление, в laravel 12 всё идеально отработало.

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            PostSeeder::class
        ]);
    }
}
            </pre>
        </div>
        Всё готово к запуски миграций и "засеиванию" таблиц данными!
        <pre>php artisan migrate --seed</pre>
    @endif
    <a href="/seeders/manual-seeder">Назад</a>
</x-layout>
