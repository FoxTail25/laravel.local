<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />

        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // изменяем длинну поля name
                $table->string('name', 100)->change();
            });
        }
    }</pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task1">Назад к задачам</a>
    @elseif($id == 2)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // удаляем колонку age
                $table->dropColumn('age');
            });
        }
    } </pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task2">Назад к задачам</a>
    @elseif($id == 3)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // переименовываем поле
                $table->dropColumn(['name','surname']);
            });
        }
    }</pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task2">Назад к задачам</a>
    @elseif($id == 4)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // переименовываем поля
                $table->renameColumn('name','first-name');
                $table->renameColumn('surname','second-name');
            });
        }
    }</pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task3">Назад к задачам</a>
    @elseif($id == 5)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // добавляем коммент к полю
                $table->string('email')->comment('поле для почты');
            });
        }
    }</pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task4">Назад к задачам</a>
    @elseif($id == 6)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // дефолтное значение для поля salary
                $table->integer('salary')->default(0);
            });
        }
    }</pre>
        ...в принципе, можно написать и default('0') - это тоже сработает, laravel автатом приведёт к цифре.
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task4">Назад к задачам</a>
    @elseif($id == 7)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // возможна запись null
                $table->integer('age')->nullable();
            });
        }
    }</pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task4">Назад к задачам</a>
    @elseif($id == 8)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // только положительные значения
                $table->integer('age')->unsigned();
            });
        }
    }</pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task4">Назад к задачам</a>
    @elseif($id == 9)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // только положительные значения
                $table->string('name')->first()->change();
            });
        }
    }</pre>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task5">Назад к задачам</a>
    @elseif($id == 10)
        <x-page.tasks.header :text="$text" />
        <pre>&lt;?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
        * Run the migrations.
        */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // добавляем новое поле sex после поля id
                $table->string('sex')->after('id');
            });
        }

        /**
        * Reverse the migrations.
        */
        public function down(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // при откате миграции удаляем поле
                $table->dropColumn('sex');
            });
        }
    } </pre>
        <b>
            <i>
                Если в таблице users уже есть данные, эта миграция вызовет ошибку, так как новое поле sex не может быть
                пустым (NOT NULL).Если в таблице уже есть пользователи, нам нужно либо разрешить NULL, либо задать
                дефолтное значение:
                <ol>
                    <li>
                        <pre>$table->string('sex')->nullable()->after('id');</pre>
                    </li>
                    <li>
                        <pre>$table->string('sex')->default('unknown')->after('id');</pre>
                    </li>
                </ol>
            </i>
        </b>
        <br />
        <br />
        <a href="{{ route('migration-fields') }}#migration-field_task5">Назад к задачам</a>
    @endif
</x-layout>
