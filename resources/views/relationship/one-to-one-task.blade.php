<x-layout>
    <x-slot:title>
        Связь один к однму в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <ul>
            <h5>
                users_r
            </h5>
            <li>id</li>
            <li>login</li>
            <li>password</li>
        </ul>
        <ul>
            <h5>
                profile
            </h5>
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
        {{ dump($data['user']) }}
        {{ dump($data['profile']) }}

        <a href="/relationship/one-to-one#task2">Назад</a>
    @endif
</x-layout>
