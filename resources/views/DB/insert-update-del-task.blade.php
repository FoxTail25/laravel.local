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
        'data' =  DB::table('users')->insert([greateNewUser(3)]);

        function greateNewUser(int $count)
        {
            $result = [];
            $nextUserNumber = DB::table('users')->count();
            $currentTime = Carbon::now();

            for ($i = 1; $i <= $count; $i++) {
                $result[] = [
                    'name' => "userName" . $nextUserNumber + $i,
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
    @endif

</x-layout>
