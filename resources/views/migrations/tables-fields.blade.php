<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    <h2>
        Колонки таблиц в миграциях Laravel
    </h2>
    <div>
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
        <h3>
            Колонка Id
        </h3>
        Следующий метод создает поле с именем id, представляющее собой первичный ключ:
        <pre>
$table->id();</pre>
        <h3>
            Первичный ключ
        </h3>
        Следующий метод также создает первичный ключ, но позволяет задать имя колонке:
        <pre>
$table->increments('id');</pre>
        <h3>
            Тип INTEGER
        </h3>
        Следующий метод создает поле с указанным именем и типом INTEGER:
        <pre>
$table->integer('age');</pre>
        <h3>
            Тип VARCHAR
        </h3>
        Следующий метод создает поле с указанным именем и типом VARCHAR:
        <pre>
$table->string('name');</pre>
        <h3>
            Тип VARCHAR с длиной
        </h3>
        Следующий метод создает поле с указанным именем, типом VARCHAR и заданной длиной: (в базе SQLite это может не
        сработать. Это особенности базы SQLite. В MySQL работает)
        <pre>
$table->string('name', 100);</pre>
        <h3>
            Тип TEXT
        </h3>
        Следующий метод создает поле с указанным именем и типом TEXT:
        <pre>
$table->text('text');</pre>
        <h3>
            Тип DATE
        </h3>
        Следующий метод создает поле с указанным именем и типом DATE:
        <pre>
$table->date('created_at');</pre>
        <h3>
            Тип DATETIME
        </h3>
        Следующий метод создает поле с указанным именем и типом DATETIME:
        <pre>
$table->dateTime('created_at');</pre>
        <h3>
            Тип TIMESTAMP
        </h3>
        Следующий метод создает поле с указанным именем и типом TIMESTAMP:
        <pre>
$table->timestamp('added_on');</pre>

        <h2>
            Полный список:
        </h2>

        <h3>
            Идентификаторы (Primary Keys)
        </h3>

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

        <h3>
            Текстовые типы (Strings & Text)
        </h3>

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

        <h3>
            Числовые типы (Numeric)
        </h3>

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

        <h3>
            Логический тип (Boolean)
        </h3>

        <ul>
            <li>
                <code>$table->boolean('is_active');</code> — <code>BOOLEAN</code>(в большинстве БД разворачивается в
                TINYINT(1))
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

        <h3>
            Дата и Время (Date & Time)
        </h3>

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

        <h3>
            Сложные форматы и JSON
        </h3>

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
                <code>updated_at</code> (ТИПА <code>TIMESTAMP</code>)
            </li>
        </ul>

        <h3>
            Сетевые и Бинарные типы
        </h3>

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

        <h3>
            Геоданные (Spatial Types)
        </h3>

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
    </div>
    <a href="/migrations/tables-fields-task/1">Задача 1</a>
    <a href="/migrations/tables-fields-task/2">Задача 2</a>

</x-layout>
