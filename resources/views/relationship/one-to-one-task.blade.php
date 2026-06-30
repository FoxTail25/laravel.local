<x-layout>
    <x-slot:title>
        Связь один к однму в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <h5>
            users_r
        </h5>
        <ul>
            <li>id</li>
            <li>login</li>
            <li>password</li>
        </ul>
        <h5>
            profile
        </h5>
        <ul>
            <li>id</li>
            <li>name</li>
            <li>surname</li>
            <li>email</li>
            <li>user_id</li>
        </ul>
        <pre>
            1) Миграция для создания таблицы users_r
            php artisan make:migration create_users_r
            в методе up прописываем нужные нам поля:
            Schema::create('users_r', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('login');
                $table->string('password');
                $table->softDeletes();
            });
            2) Миграция для создания таблицы profiles
            php artisan make:migration create_profiles
            в методе up прописываем нужные нам поля:
            Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('name');
                $table->string('surname');
                $table->string('email');
                $table->string('user_id');
                $table->softDeletes();
            });
            3) Заускаем миграции на выполнение:
            php artisan migrate
        </pre>
        <a href="/relationship/one-to-one#task1">Назад</a>
    @elseif($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
            1) Создаём модель для таблицы users_r
            php artisan make:model User_r
            полсе этого заходим в созданную модель и
            добавляем в класс следующую строку:
            protected $table = 'users_r';
            Это привяжет класс модели к нужной нам таблице.
            Если мы этого не сделаем, то Ларавель привяжет этот
            класс к таблице "user_rs".
            2) Создаём модель для таблицы profiles
            php artisan make:model Profile
            3) В модели User_r делаем привязку к моделе
            Profile
            public function profile()
            {
                // т.к. у нас нестандартное имя класса и полей,
                // добавляем второй парамтер (поле, по которому будет привязка)
                return $this->hasOne(Profile::class, 'user_id');
            }
        </pre>
        <a href="/relationship/one-to-one#task1">Назад</a>
    @elseif($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
        1) Создаём сидер php artisan make:seeder UserWithProfileSeeder
        2) В самом сидере прописываем следующий код:
namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User_r;
use Illuminate\Database\Seeder;

class UserWithProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            // 1. Создаем и сохраняем пользователя
            $user = new User_r;
            $user->login = 'moderator'.$i;
            $user->password = bcrypt('password321'.$i);
            $user->save(); // После этого у объекта $user появляется свойство id

            // 2. Создаем профиль вручную
            $profile = new Profile;
            $profile->name = 'name'.$i;
            $profile->surname = 'surname'.$i;
            $profile->email = 'name'.$i.'@example.com';

            // Руками связываем таблицы по ID созданного юзера
            $profile->user_id = $user->id;

            $profile->save();
        }
    }
}
        3) Запускаем сиидер командой
        php artisan db:seed --class=UserWithProfileSeeder
        </pre>
        <a href="/relationship/one-to-one#task1">Назад</a>
    @elseif($id == 4)
        <p>
            {{ $text }}
        </p>
        <pre>
        //Controller code:
        $user = User_r::find(1, ['id', 'login']);
        if ($user) {

            $profile = ($user->profile)->only(['name', 'surname', 'email']);
            $user = $user->only(['id', 'login']);
            $mergedUser = array_merge($user, $profile);

            return ['users' => [$mergedUser], 'fields' => array_keys($mergedUser)];
        } else {
            return 'По такому запросу пользователей нет';
        }

        //Blade code:
        &#64;if (is_string($data))
            &#123;&#123; $data }}
        &#64;else
            &lt;table>
                &lt;tr>
                    &#64;foreach ($data['fields'] as $field)
                        &lt;th>
                            &#123;&#123; $field }}
                        &lt;/th>
                    &#64;endforeach
                &lt;/tr>
                &#64;foreach ($data['users'] as $user)
                    &lt;tr>
                        &#64;foreach ($data['fields'] as $field)
                            &lt;td>
                                &#123;&#123; $user[$field] }}
                            &lt;/td>
                        &#64;endforeach
                    &lt;/tr>
                &#64;endforeach
            &lt;/table>
        &#64;endif

        &lt;a href="/relationship/one-to-one#task2">Назад&lt;/a>
        </pre>
        <div class="text-danger">
            Сразу хочется заметить что представленный выше код,
            далёк от оптимального. т.к. в нём отсутствуюет
            "жадная загрузка" (защита от N+1). И защита от
            отсутствия данных. Как это правильно реализовать
            будет рассмотрено в дальнейших уроках.
        </div>

        @if (is_string($data))
            {{ $data }}
        @else
            <table>
                <tr>
                    @foreach ($data['fields'] as $field)
                        <th>
                            {{ $field }}
                        </th>
                    @endforeach
                </tr>
                @foreach ($data['users'] as $user)
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <td>
                                {{ $user[$field] }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @endif

        <a href="/relationship/one-to-one#task2">Назад</a>
    @elseif($id == 5)
        <p>
            {{ $text }}
        </p>
        <pre>
        //Controller code:
        // 1. Загружаем пользователей и нужные поля профиля
        $users = User_r::with('profile:user_id,name,surname,email')->get(['id', 'login']);
        // Если пользователей вообще нет в базе — возвращаем пустую структуру
        if ($users->isEmpty()) {
            return ['users' => [], 'fields' => []];
        }
        // 2. Преобразуем каждого пользователя в плоский массив
        $usersArray = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'login' => $user->login,
                'name' => $user->profile?->name,
                'surname' => $user->profile?->surname,
                'email' => $user->profile?->email,
            ];
        })->toArray();
        // 3. Динамически берем ключи (поля) из первого найденного пользователя
        $fields = array_keys($usersArray[0]);

        return [
            'users' => $usersArray,
            'fields' => $fields,
        ];

        //Blade code:
        &#64;if (empty($data['users']))
            По такому запросу пользователей нет
        &#64;else
            &lt;table>
                &lt;tr>
                    &#64;foreach ($data['fields'] as $field)
                        &lt;th>
                            &#123;&#123; $field }}
                        &lt;/th>
                    &#64;endforeach
                &lt;/tr>
                &#64;foreach ($data['users'] as $user)
                    &lt;tr>
                        &#64;foreach ($data['fields'] as $field)
                            &lt;td>
                                &#123;&#123; $user[$field] ?? '' }}
                            &lt;/td>
                        &#64;endforeach
                    &lt;/tr>
                &#64;endforeach
            &lt;/table>
        &#64;endif

        &lt;a href="/relationship/one-to-one#task2">Назад&lt;/a>
        </pre>
        @if (empty($data['users']))
            По такому запросу пользователей нет
        @else
            <table>
                <tr>
                    @foreach ($data['fields'] as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                </tr>
                @foreach ($data['users'] as $user)
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <td>{{ $user[$field] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @endif

        <a href="/relationship/one-to-one#task3">Назад</a>
    @elseif($id == 6)
        <p>
            {{ $text }}
        </p>
        <pre>
        //model code:
        namespace App\Models;

        use Illuminate\Database\Eloquent\Model;

        class Profile extends Model
        {
            public function user_r()
            {
                return $this->belongsTo(User_r::class);
            }
        }</pre>
        <a href="/relationship/one-to-one#task4">Назад</a>
    @elseif($id == 7)
        <p>
            {{ $text }}
        </p>
        <pre>
        </pre>
        @if (empty($data['users']))
            По такому запросу пользователей нет
        @else
            <table>
                <tr>
                    @foreach ($data['fields'] as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                </tr>
                @foreach ($data['users'] as $user)
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <td>{{ $user[$field] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @endif
        <a href="/relationship/one-to-one#task4">Назад</a>
    @elseif($id == 8)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        // 1. Загружаем пользователей и нужные поля профиля
        $profilesCollection = Profile::with('user_r:id,login')->get(['user_id', 'name', 'surname', 'email']);
        // 2. Если пользователей нет, то вернётся пустой массив.
        if ($profilesCollection->isEmpty()) {
            return ['users' => [], 'fields' => []];
        }
        // 3. Преобразуем коллекцию
        $usersArray = $profilesCollection->map(function ($profile) {
            return [
                'login' => $profile->user_r?->login,
                'name' => $profile->name,
                'surname' => $profile->surname,
                'email' => $profile->email,
            ];
        })->toArray();
        // 4. Динамически берем ключи (поля) из первого найденного пользователя
        $fields = array_keys($usersArray[0]);

        return ['users' => $usersArray, 'fields' => $fields];


        //Blade code:
        &#64;if (empty($data['users']))
            По такому запросу пользователей нет
        &#64;else
            &lt;table>
                &lt;tr>
                    &#64;foreach ($data['fields'] as $field)
                        &lt;th>
                            &#123;&#123; $field }}
                        &lt;/th>
                    &#64;endforeach
                &lt;/tr>
                &#64;foreach ($data['users'] as $user)
                    &lt;tr>
                        &#64;foreach ($data['fields'] as $field)
                            &lt;td>
                                &#123;&#123; $user[$field] ?? '' }}
                            &lt;/td>
                        &#64;endforeach
                    &lt;/tr>
                &#64;endforeach
            &lt;/table>
        &#64;endif

        &lt;a href="/relationship/one-to-one#task2">Назад&lt;/a>
        </pre>
        @if (empty($data['users']))
            По такому запросу пользователей нет
        @else
            <table>
                <tr>
                    @foreach ($data['fields'] as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                </tr>
                @foreach ($data['users'] as $user)
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <td>{{ $user[$field] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @endif
        <a href="/relationship/one-to-one#task4">Назад</a>
    @endif
</x-layout>
