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
                'name' => Str::random(5),
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
    @endif
    <a href="/seeders/manual-seeder">Назад</a>
</x-layout>
