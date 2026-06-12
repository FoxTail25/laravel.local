<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

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
            // создаём столбец
            $table->string('new_field');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // удаляем столбец
            $table->dropColumn('new_field');
        });
    }
 } </pre>
        </div>
    @elseif($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

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
            // удаляем столбец
            $table->dropColumn('old_field');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // создаём столбец
            $table->string('old_field');
        });
    }
 } </pre>
        </div>
    @elseif($id == 3)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

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
            // удаляем 2 столбца
            $table->dropColumn(['name',surname]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // создаём удалённые столбецы
            $table->string('name');
            $table->string('surname');
        });
    }
 } </pre>
        </div>
    @elseif($id == 4)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

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
            // Порядок столбцов: id, name, surname, age
            // ставим столбец name на первое место
            $table->string(name)->first()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // возвращаем столбец на прошлое место
            $table->string('name')->after('id')->change();
        });
    }
 } </pre>
        </div>
    @elseif($id == 5)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

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
        // Меняем имя таблицы
        Schema::rename('users', 'poeple');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // возвращаем прошлое имя
        Schema::rename('poeple','users');
    }
 } </pre>
        </div>
    @endif
    <a href="/migrations/migration-rollback">Назад</a>
</x-layout>
