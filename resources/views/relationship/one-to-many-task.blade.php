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
    @elseif($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
//Добавляем метод в модель Countrynamespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
        </pre>
        <a href="/relationship/one-to-many#task1">Назад</a>
    @elseif($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
// Что бы получить что-либо из таблиц.
// Их надо сначала чем-то заполнить. ))
// Создаём seeder:
php artisan make:seeder CountryCitySeeder
// Заполняем метод run в сеятеле:
public function run(): void
{
    // 1. Создаем первую страну
    $russia = Country::create(['name' => 'Россия']);

    // Добавляем города для Германии через связь cities()
    $russia->cities()->createMany([
        ['name' => 'Москва'],
        ['name' => 'Санкт-Петербург'],
        ['name' => 'Казань'],
    ]);

    // 2. Создаем вторую страну
    $france = Country::create(['name' => 'Франция']);

    // Добавляем города для Франции
    $france->cities()->createMany([
        ['name' => 'Париж'],
        ['name' => 'Марсель'],
        ['name' => 'Лион'],
    ]);

    // 3. Создаем третью страну
    $italy = Country::create(['name' => 'Италия']);

    $italy->cities()->createMany([
        ['name' => 'Рим'],
        ['name' => 'Милан'],
    ]);
}
// Запускаем сеялку:
 php artisan db:seed --class=CountryCitySeeder

// Теперь можем получить данные!
// Controller code:
    $countries = Country::all();
    return $countries;

// Blade code:
#$64;foreach ($data as $country)
    &lt;h4> &#123;&#123; $country->name }}&lt;/h4>
    &lt;ul>
        #$64;foreach ($country->cities as $city)
            &lt;li>
                &#123;&#123; $city->name }}
            &lt;/li>
        #$64;endforeach
    &lt;/ul>
#$64;endforeach
&lt;a href="/relationship/one-to-many#task2">Назад&lt;/a>

        </pre>
        @foreach ($data as $country)
            <h4> {{ $country->name }}</h4>
            <ul>
                @foreach ($country->cities as $city)
                    <li>
                        {{ $city->name }}
                    </li>
                @endforeach
            </ul>
        @endforeach
        <a href="/relationship/one-to-many#task2">Назад</a>
    @elseif($id == 4)
        <p>
            {{ $text }}
        </p>
        <pre>
1) Создаём миграцию
php artisan make:migration add_field_population_in_cities
2) Прописываем в миграции методы up и down:
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            // Добавляем поле population в таблицу cities
            $table->integer('population')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            // Удаляем поле population:
            $table->dropColumn('population');
        });
    }
3) Запускаем миграцию:
php artisan migrate
4) Создаём сеятель для заполнения поля population
php artisan make:seeder CityPopulationSeeder
5) Заполняем метод run в нашем сеятеле:
(и не забываем заюзать класс City)
namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CityPopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 получаем все города:
        $cities = City::all();

        foreach ($cities as $city) {
            $city->population = rand(80000, 120000);
            $city->save();
        }
    }
}
6) Запускаем сеятель:
php artisan db:seed --class=CityPopulationSeeder
        </pre>

        <a href="/relationship/one-to-many#task3">Назад</a>
    @elseif($id == 5)
        <p>
            {{ $text }}
        </p>
        <pre>

// Controller code:
'data' => function () {
    // 1. Получаем все страны
    $countries = Country::all();
    $result = [];

    // 2. Перебираем каждую страну в цикле
    foreach ($countries as $country) {

        $largeCities = $country->cities()
            ->select('name', 'population')
            ->where('population', '>', 100000)
            ->get();
        // 3. Если в стране есть города > 100000
        if ($largeCities->isNotEmpty()) {
            $result[$country->name] = $largeCities->toArray();
        }
    }

    return $result;
// Код очень плохой!!! Он имеет уязвимость N+1 !!!


// Blade code:
#$64;foreach ($data as $country => $cityArr)
    &lt;h4> &#123;&#123; $country }}&lt;/h4>
    &lt;ul>
        #$64;foreach ($citiesArr as $city)
            &lt;li>
                &#123;&#123; $city['name'] }}
                &#123;&#123; $city['population'] }}
            &lt;/li>
        #$64;endforeach
    &lt;/ul>
#$64;endforeach
&lt;a href="/relationship/one-to-many#task2">Назад&lt;/a></pre>
        @foreach ($data as $country => $citiesArr)
            <h4> {{ $country }}</h4>
            <ul>
                @foreach ($citiesArr as $city)
                    <li>
                        {{ $city['name'] }}
                        {{ $city['population'] }}
                    </li>
                @endforeach
            </ul>
        @endforeach
        <a href="/relationship/one-to-many#task3">Назад</a>
    @elseif($id == 6)
        <p>
            {{ $text }}
        </p>
        <pre>

// Controller code:
'data' => function () {
    // 1. Получаем все страны
    $countries = Country::all();
    $result = [];

    // 2. Перебираем каждую страну в цикле
    foreach ($countries as $country) {

        $result[$country->name] = $country->cities()
            ->select('country_id', 'name', 'population')
            // 3. Сортируем по полю population
            ->orderBy('population')
            ->get();
    }

    return $result;
// Код очень плохой!!! Он имеет уязвимость N+1 !!!


// Blade code:
#$64;foreach ($data as $country => $cityArr)
    &lt;h4> &#123;&#123; $country }}&lt;/h4>
    &lt;ul>
        #$64;foreach ($citiesArr as $city)
            &lt;li>
                &#123;&#123; $city['name'] }}
                &#123;&#123; $city['population'] }}
            &lt;/li>
        #$64;endforeach
    &lt;/ul>
#$64;endforeach
&lt;a href="/relationship/one-to-many#task2">Назад&lt;/a></pre>
        @foreach ($data as $country => $citiesArr)
            <h4> {{ $country }}</h4>
            <ul>
                @foreach ($citiesArr as $city)
                    <li>
                        {{ $city['name'] }}
                        {{ $city['population'] }}
                    </li>
                @endforeach
            </ul>
        @endforeach
        <a href="/relationship/one-to-many#task3">Назад</a>
    @elseif($id == 7)
        <p>
            {{ $text }}
        </p>
        <pre>
// class City code:
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function category()
    {
        return $this->belongsTo(Country::class);
    }
}</pre>
        <a href="/relationship/one-to-many#task4">Назад</a>
    @elseif($id == 8)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller code:
// 1. Узнаём количество записей в таблице cities
$count = City::count();
// 2. Получаем один рандомный город
$city = $count > 0 ? City::skip(rand(0, $count - 1))->first() : null;

return $city;

// Blade code:
Город: &#123;&#123; $data->name }}
Страна: &#123;&#123; $data->country->name }}
</pre>
        Город: {{ $data->name }}
        Страна: {{ $data->country->name }}
        <br />
        <a href="/relationship/one-to-many#task4">Назад</a>
    @elseif($id == 9)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller code:
// 1. Получаем все города
$cities = City::All();

return $cities;

// Blade code:
&#64;foreach ($data as $city)
    Город: &#123;&#123; $data->name }}
    Страна: &#123;&#123; $data->country->name }}
&lt;br />
&#64;endforeach
</pre>
        @foreach ($data as $city)
            Город: {{ $city->name }}
            Страна: {{ $city->country->name }}
            <br />
        @endforeach
        <br />
        <a href="/relationship/one-to-many#task4">Назад</a>
    @elseif($id == 10)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller code:
// 1. Получаем все города, где население больше 100 000
$cities = City::where('population', '>', 100000)->get();

return $cities;

// Blade code:
&#64;foreach ($data as $city)
    Город: &#123;&#123; $data->name }}
    Население: &#123;&#123; $data->population }}
    Страна: &#123;&#123; $data->country->name }}
&lt;br />
&#64;endforeach

// Снова подчеркну что это очень неоптимизированные решения
// Отягощённые проблемой N+1 (т.е. очень большое количество обращений к БД)
// Это решается "жадной загрузкой" и будет рассмотренно позже.
</pre>
        @foreach ($data as $city)
            Город: {{ $city->name }}
            Население: {{ $city->population }}
            Страна: {{ $city->country->name }}
            <br />
        @endforeach
        <br />
        <a href="/relationship/one-to-many#task4">Назад</a>
    @elseif($id == 11)
        <p>
            {{ $text }}
        </p>
        <h4>
            employees
        </h4>
        <ul>
            <li>id</li>
            <li>name</li>
            <li>city_id</li>
            <li>position_id</li>
        </ul>
        <h4>
            positions
        </h4>
        <ul>
            <li>id</li>
            <li>name</li>
        </ul>
        <pre>
    // 1) создаём миграцию на создание таблицы employees:
    // php artisan make:migration create_employees
    // 2) прописываем методы up и down
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('city_id');
            $table->integer('position_id');
            $table->timestamps(); // эти поля хоть и не обязательны но лучше их добавить
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
    // 3) создаём миграцию на создание таблицы positions:
    // php artisan make:migration create_positions
    // 4) прописываем методы up и down
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps(); // эти поля хоть и не обязательны но лучше их добавить
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
    // 5) Запускаем миграции
    // php artisan migrate
    // 6) Создаём классы для созданных таблиц:
    // php artisan make:model Employee
    // php artisan make:model Position
    // 7) Создаём Seeder для заплнения созданных таблиц:
    // php artisan make:seeder EmployeeWithPositionSeeder
    // 8) Пишем Seeder для заплнения созданных таблиц:
    namespace Database\Seeders;

    use App\Models\Employee;
    use App\Models\Position;
    use Illuminate\Database\Seeder;

    class EmployeeWithPositionSeeder extends Seeder
    {
        public function run(): void
        {
            // 1. Сначала создаем должности, чтобы у них появились ID 1 и 2
            // Используем метод insert() или create()
            Position::query()->create(['name' => 'chief']);
            Position::query()->create(['name' => 'worker']);

            // 2. Цикл создания сотрудников
            for ($i = 1; $i <= 10; $i++) {
                Employee::query()->create([
                    'name' => 'employee'.$i,
                    'city_id' => rand(1, 8),
                    'position_id' => in_array($i, [5, 10]) ? 1 : 2,
                ]);
            }
        }
    }
    9) Запускаем "сеятель"
    php artisan db:seed --class=EmployeeWithPositionSeeder

        </pre>
        <a href="/relationship/one-to-many#task5">Назад</a>
    @elseif($id == 12)
        <p>
            {{ $text }}
        </p>

        <pre>
class Employee extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
        </pre>
        <a href="/relationship/one-to-many#task5">Назад</a>
    @elseif($id == 13)
        <p>
            {{ $text }}
        </p>

        <pre>
// Controller code:
// узнаём количество записей в таблице employees:
$count = Employee::count();

// возвращаем рандомного сотрудника в представелние
return $count > 0 ? Employee::skip(rand(0, $count - 1))->first() : null;

// Blade code:
Имя: &#123;&#123; $data->name }}<br />
Город: &#123;&#123; $data->city->name }}<br />
Должность: &#123;&#123; $data->position->name }}<br />
        </pre>
        Имя: {{ $data->name }}<br />
        Город: {{ $data->city->name }}<br />
        Должность: {{ $data->position->name }}<br />
        <a href="/relationship/one-to-many#task5">Назад</a>
    @endif


</x-layout>
