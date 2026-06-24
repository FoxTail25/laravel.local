<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => function () {
            $nextUserNumber = DB::table('users')->count() + 1;
            $currentTime = Carbon::now();

            return DB::table('users')->insert([
                'name' => "userName{$nextUserNumber}",
                'email' => "userName{$nextUserNumber}@gmail.com",
                'age' => mt_rand(30, 50),
                'salary' => fake()->numberBetween(2000, 3000),
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ]);
        },

        //blade code:
        &lt;h4>Новый пользователь добавлен в базу данных&lt;/h4>
        &#123;&#123; dump($data) }}
        </pre>
        <h4>Новый пользователь добавлен в базу данных</h4>
        {{ dump($data) }}
        <a href="/DB/insert-update-del#task1">Назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => function () {
            $nextUserNumber = DB::table('users')->count() + 1;
            $currentTime = Carbon::now();

            return DB::table('users')->insertGetId([
                'name' => "userName{$nextUserNumber}",
                'email' => "userName{$nextUserNumber}@gmail.com",
                'age' => mt_rand(30, 50),
                'salary' => fake()->numberBetween(2000, 3000),
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ]);
        },

        //blade code:
        &lt;h4>Новый пользователь добавлен в базу данных&lt;/h4>
        id нового пользователя: &#123;&#123; $data }}
        &lt;br/>
        </pre>
        <h4>Новый пользователь добавлен в базу данных</h4>
        id нового пользователя: {{ $data }}
        <br />
        <a href="/DB/insert-update-del#task1">Назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' =  DB::table('users')->insert(greateNewUser(3));

        function greateNewUser(int $count)
        {
            $result = [];
            $nextUserNumber = DB::table('users')->count();
            $currentTime = Carbon::now();

            for ($i = 1; $i <= $count; $i++) {
                $result[] = [
                    'name' => "userName" . ($nextUserNumber + $i),
                    'email' => "userName" . ($nextUserNumber + $i) . "@gmail.com",
                    'age' => mt_rand(30, 50),
                    'salary' => fake()->numberBetween(2000, 3000),
                    'created_at' => $currentTime,
                    'updated_at' => $currentTime,
                ];
            }
            return $result;
        }

        //blade code:
        &lt;h4>Новые пользователи добавлены в базу данных&lt;/h4>
        &#123;&#123;  dump($data) }}
        &lt;br/>
        </pre>
        <h4>Новые пользователи добавлены в базу данных</h4>
        {{ var_dump($data) }}
        <br />
        <a href="/DB/insert-update-del#task1">Назад</a>
    @elseif ($id == 4)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' =  DB::table('users')
            ->where('age','>', 30)
            ->update([
                'email' => 'userName5@gmail.com'
                ])

        //blade code:
        &lt;h4>Новые пользователи добавлены в базу данных&lt;/h4>
        &#123;&#123;  dump($data) }}
        &lt;br/>
        </pre>
        <h4>Новые пользователи добавлены в базу данных</h4>
        {{ var_dump($data) }}
        <br />
        <a href="/DB/insert-update-del#task2">Назад</a>
    @elseif ($id == 5)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' =  DB::table('users')
            ->where('id', 5)
            ->update([
                'email' => 'userName5@gmail.com'
                ])

        //blade code:
        &lt;h4>Новые пользователи добавлены в базу данных&lt;/h4>
        &#123;&#123;  dump($data) }}
        &lt;br/>
        </pre>
        <h4>Новые пользователи добавлены в базу данных</h4>
        {{ var_dump($data) }}
        <br />
        <a href="/DB/insert-update-del#task2">Назад</a>
    @elseif ($id == 6)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' =  DB::table('users')
            ->where('id', 1)
            ->increment('age')

        //blade code:
        &#123;&#123;  dump($data) }}
        &lt;br/>
        </pre>
        {{ var_dump($data) }}
        <br />
        <a href="/DB/insert-update-del#task3">Назад</a>
    @elseif ($id == 7)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' =  DB::table('users')
            ->where('id', 1)
            ->decrement('age')

        //blade code:
        &#123;&#123;  dump($data) }}
        &lt;br/>
        </pre>
        {{ var_dump($data) }}
        <br />
        <a href="/DB/insert-update-del#task3">Назад</a>
    @elseif ($id == 8)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        DB::table('users')
            ->where('age', 30)
            ->increment('salary', 100)

        //blade code:
        &#123;&#123;  dump($data) }}
        &lt;br/>
        </pre>
        {{ var_dump($data) }}
        <br />
        <a href="/DB/insert-update-del#task3">Назад</a>
    @elseif ($id == 9)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        // вернётся количество удалённых строк
        return DB::table('users')
            ->where('id', DB::table('users')->max('id'))
            ->delete();


        //blade code:
        Количество удалённых записей:&#123;&#123;  $data }}
        &lt;br/>
        </pre>
        Количество удалённых записей:{{ $data }}
        <br />
        <a href="/DB/insert-update-del#task3">Назад</a>
    @elseif ($id == 10)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        // вернётся количество удалённых строк
        return DB::table('users')
            ->where('age', 30)
            ->delete();


        //blade code:
        &#123;&#123;  $data }}
        &lt;br/>
        </pre>
        {{ $data }}
        <br />
        <a href="/DB/insert-update-del#task3">Назад</a>
    @elseif ($id == 11)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        // вернётся количество удалённых строк
        DB::table('users')->delete();


        //blade code:
        &#123;&#123;  $data }}
        &lt;br/>
        </pre>
        {{ $data }}
        <br />
        <a href="/DB/insert-update-del#task3">Назад</a>
    @elseif ($id == 12)
        <p>
            {{ $text }}
        </p>
        <pre>
    1) Создаём миграцию на создание таблицы с городами:
    php artisan make:migration create_citys_table
    2) Заполняем метод UP в созданной миграции:
    public function up(): void
    {
            Schema::create('citys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
    }
    3) Запускаем миграцию: php artisan migrate
    4) Создаём сидер для заполения таблицы городов:
    php artisan make:seeder CitySeeder
    5) Пишем в созданном seeder метод для заполнения данных
    public function run(): void
    {
        //Заполнение таблицы городов
        DB::table('citys')->insert([
            ['name' => 'Москва'],
            ['name' => 'Минск'],
            ['name' => 'Рязань'],
            ['name' => 'Кострома'],
        ]);
    }
    6) Запускаем созданным нами seeder:
    php artisan db:seed --class=CitySeeder
    7) Теперь нам нужна миграция для добавления поля city_id в таблицу users
    php artisan make:migration add_fild_city_id_in_users_table
    8) Заполняем метод UP миграции:
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Добавляем поле user_city в таблицу users
            $table->int('city');
        });
    }
    9) На осталось заполнить созданное поле. Создаём seeder:
    php artisan make:seeder UpdateUsersCitySeeder
    10) Заполняем метод Run нашего сидера:
    public function run(): void
    {
        // Получаем всех пользователей и еребираем всех пользователей построчно (по 10 записей)
        DB::table('users')->orderBy('id')->chunkById(10, function ($users) {
            foreach ($users as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        // функция PHP генерирует число от 1 до 4
                        'city' => rand(1, 4),
                    ]);
            }
        });
    }
    11) Запускаем выполнение сидера
    php artisan db:seed --class=UpdateUsersCitySeeder
    12) Теперь всё готово что бы получить таблицу наших пользователей вместе с их городами:

    // Controller code:
    DB::table('users')
    ->leftJoin('citys', 'citys.id', '=', 'users.city')
    ->select('users.name as user', 'citys.name as city')
    ->get()

    // Blade code:
        &lt;table>
            &lt;tr>
                &lt;th>user&lt;/th>
                &lt;th>city&lt;/th>
            &lt;/tr>
            &#64;foreach ($data as $user)
                &lt;tr>
                    &lt;td>
                        &#123;&#123; $user->user }}
                    &lt;/td>
                    &lt;td>
                        &#123;&#123; $user->city }}
                    &lt;/td>
                &lt;/tr>
            &#64;endforeach
        &lt;/table>
        </pre>
        <table>
            <tr>
                <th>user</th>
                <th>city</th>
            </tr>
            @foreach ($data as $user)
                <tr>
                    <td>
                        {{ $user->user }}
                    </td>
                    <td>
                        {{ $user->city }}
                    </td>
                </tr>
            @endforeach
        </table>
        <br />
        <a href="/DB/insert-update-del#task4">Назад</a>
    @endif

</x-layout>
