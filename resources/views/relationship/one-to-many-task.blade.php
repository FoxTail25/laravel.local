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
    @endif


</x-layout>
