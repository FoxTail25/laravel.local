<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    <h3>
        Колонки таблиц в миграциях Laravel
    </h3>
    Давайте теперь научимся задавать колонки, которые будут в созданной таблице. Пусть у нас есть следующая
    миграция:
    <pre>
&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
	{
		public function up()
		{
			Schema::create('posts', function (Blueprint $table) {
				// здесь создаются колонки таблицы
			});
		}

		public function down()
		{
			Schema::dropIfExists('posts');
		}
	}</pre>
    В коде миграции метод Schema::create создает таблицу. Имя таблицы указывается первым параметром. Вторым
    параметром передается коллбэк, в который Laravel автоматически передает объект с методами для создания колонок.
    Давайте рассмотрим эти методы.
    <h5>
        Колонка Id
    </h5>
    Следующий метод создает поле с именем id, представляющее собой первичный ключ:
    <pre>
$table->id();</pre>
    <h5>
        Первичный ключ
    </h5>
    Следующий метод также создает первичный ключ, но позволяет задать имя колонке:
    <pre>
$table->increments('id');</pre>
    <h5>
        Тип INTEGER
    </h5>
    Следующий метод создает поле с указанным именем и типом INTEGER:
    <pre>
$table->integer('age');</pre>
    <h5>
        Тип VARCHAR
    </h5>
    Следующий метод создает поле с указанным именем и типом VARCHAR:
    <pre>
$table->string('name');</pre>
    <h5>
        Тип VARCHAR с длиной
    </h5>
    Следующий метод создает поле с указанным именем, типом VARCHAR и заданной длиной: (в базе SQLite это может не
    сработать. Это особенности базы SQLite. В MySQL работает)
    <pre>
$table->string('name', 100);</pre>
    <h5>
        Тип TEXT
    </h5>
    Следующий метод создает поле с указанным именем и типом TEXT:
    <pre>
$table->text('text');</pre>
    <h5>
        Тип DATE
    </h5>
    Следующий метод создает поле с указанным именем и типом DATE:
    <pre>
$table->date('created_at');</pre>
    <h5>
        Тип DATETIME
    </h5>
    Следующий метод создает поле с указанным именем и типом DATETIME:
    <pre>
$table->dateTime('created_at');</pre>
    <h5>
        Тип TIMESTAMP
    </h5>
    Следующий метод создает поле с указанным именем и типом TIMESTAMP:
    <pre>
$table->timestamp('added_on');</pre>

    <h4>
        Полный список:
    </h4>

    <h5>
        Идентификаторы (Primary Keys)
    </h5>

    <ul>
        <li>
            <code>$table->id();</code> — автоинкрементный UNSIGNED BIGINT (основной стандарт для Laravel).
        </li>
        <li>
            <code>$table->uuid('id');</code> — колонка под UUID (уникальный текстовый идентификатор).
        </li>
        <li>
            <code>$table->ulid('id');</code> — колонка под ULID (сортируемый аналог UUID).
        </li>
        <li>
            <code>$table->increments('id');</code> — автоинкрементный UNSIGNED INT (старый стиль).
        </li>
    </ul>

    <h5>
        Текстовые типы (Strings & Text)
    </h5>

    <ul>
        <li>
            <code>$table->string('name', 255);</code> — <code>VARCHAR</code> с возможностью указать длину (по
            умолчанию 255).
        </li>
        <li>
            <code>$table->char('code', 4);</code> — <code>CHAR</code> фиксированной длины.
        </li>
        <li>
            <code>$table->text('description');</code> — стандартный <code>TEXT</code> для больших текстов.
        </li>
        <li>
            <code>$table->mediumText('bio');</code> — <code>MEDIUMTEXT</code>
        </li>
        <li>
            <code>$table->longText('content');</code> — <code>LONGTEXT</code> для огромных объемов данных
        </li>
    </ul>

    <h5>
        Числовые типы (Numeric)
    </h5>

    <ul>
        <li>
            <code>$table->integer('votes');</code> — стандартный<code>INT</code>
        </li>
        <li>
            <code>$table->tinyInteger('status');</code> — <code>TINYINT</code> (числа от -128 до 127)
        </li>
        <li>
            <code>$table->smallInteger('age');</code> — <code>SMALLINT</code>
        </li>
        <li>
            <code>$table->mediumInteger('rank');</code> — <code>MEDIUMINT</code>
        </li>
        <li>
            <code>$table->bigInteger('count');</code> — <code>BIGINT</code>
        </li>
        <li>
            <code>$table->unsignedInteger('user_id');</code> — <code>UNSIGNE INT</code> (только положительные числа)
        </li>
        <li>
            <code>$table->decimal('price', 8, 2);</code> — точное число с плавающей точкой (всего цифр, цифр после
            запятой)
        </li>
        <li>
            <code>$table->float('lat', 10, 6);</code> — <code>FLOAT</code>
        </li>
        <li>
            <code>$table->double('amount', 15, 8);</code> — <code>DOUBLE</code>
        </li>
    </ul>

    <h5>
        Логический тип (Boolean)
    </h5>

    <ul>
        <li>
            <code>$table->boolean('is_active');</code> — <code>BOOLEAN</code>(в большинстве БД разворачивается в
            TINYINT(1))
        </li>

    </ul>

    <h5>
        Дата и Время (Date & Time)
    </h5>

    <ul>
        <li>
            <code>$table->date('birthday');</code> — только дата.<code>(YYYY-MM-DD)</code>
        </li>
        <li>
            <code>$table->time('starts_at');</code> — только время<code>(HH:MM:SS)</code> (числа от -128 до 127)
        </li>
        <li>
            <code>$table->dateTime('published_at');</code> — дата и время <code>DATETIME</code>
        </li>
        <li>
            <code>$table->timestamp('created_at');</code> — временная метка <code>TIMESTAMP</code>
        </li>
        <li>
            <code>$table->timestamp();</code> — автоматически создает <code>created_at</code> и
            <code>updated_at</code> (ТИПА <code>TIMESTAMP</code>)
        </li>
        <li>
            <code>$table->softDeletes();</code> — создает nullable-поле<code>deleted_at</code> для механизма мягкого
            удаления.
        </li>
    </ul>

    <h5>
        Сложные форматы и JSON
    </h5>

    <ul>
        <li>
            <code>$table->json('options');</code> — <code>JSON</code> поле (удобно для хранения массивов и
            объектов).
        </li>
        <li>
            <code>$table->jsonb('metadata');</code> — code>(JSONB)</code> (актуально для более быстрого поиска в
            PostgreSQL).
        </li>
        <li>
            <code>$table->enum('role', ['admin', 'user']);</code> — перечисление <code>ENUM</code> (поле может
            принимать только указанные строки).
        </li>
        <li>
            <code>$table->set('flavors', ['strawberry', 'vanilla']);</code> — тип данных <code>SET</code> (для
            MySQL).
        </li>
    </ul>

    <h5>
        Сетевые и Бинарные типы
    </h5>

    <ul>
        <li>
            <code>$table->ipAddress('visitor_ip');</code> — IP-адрес (автоматически подбирает тип под IPv4/IPv6).
        </li>
        <li>
            <code>$table->macAddress('device_mac');</code> — MAC-адрес устройства.
        </li>
        <li>
            <code>$table->binary('photo');</code> — бинарные данные (<code>BLOB</code> или <code>BYTEA</code>).
        </li>
    </ul>

    <h5>
        Геоданные (Spatial Types)
    </h5>

    <ul>
        <li>
            <code>$table->geometry('position');</code> — базовый тип геометрии.
        </li>
        <li>
            <code>$table->point('location');</code> — географическая точка (координаты).
        </li>
        <li>
            <code>$table->lineString('path');</code> — линия из точек.
        </li>
        <li>
            <code>$table->polygon('area');</code> — многоугольник (полигон).
        </li>
    </ul>
    <x-page.content.task.head :data="['migrations_tables-fields', 'Задачи:']" />
    <x-page.content.task.body href='migration-tables-fields-tasks' :tasks="[
        1 => [
            'text' =>
                'Сделайте миграцию, создающую таблицу со статьями. Пусть у этой таблицы будут поля с заголовком статьи, ее текстом, датой создания.',
        ],
        2 => [
            'text' =>
                'Сделайте миграцию, создающую таблицу с юзерами. Пусть у этой таблицы будут поля с именем, фамилией, датой рождения, датой создания юзера.',
        ],
    ]" />
    <br />
    <br />


</x-layout>
