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
            // изменяем длинну поля name
            $table->string('name', 100)->change();
        });
    }</pre>
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
            // удаляем колонку age
            $table->dropColumn('age');
        });
    } </pre>
        </div>
    @elseif($id == 3)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // переименовываем поле
            $table->dropColumn(['name','surname']);
        });
    } </pre>
    @elseif($id == 4)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // переименовываем поля
            $table->renameColumn('name','first-name');
            $table->renameColumn('surname','second-name');
        });
    } </pre>
    @elseif($id == 5)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // добавляем коммент к полю
            $table->string('email')->comment('поле для почты');
        });
    } </pre>
    @elseif($id == 6)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // дефолтное значение для поля salary
            $table->integer('salary')->default(0);
        });
    } </pre>
        ...в принципе, можно написать и default('0') - это тоже сработает, laravel автатом приведёт к цифре.
    @elseif($id == 7)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // возможна запись null
            $table->integer('age')->nullable();
        });
    } </pre>
        ...в принципе, можно написать и default('0') - это тоже сработает, laravel автатом приведёт к цифре.
    @elseif($id == 8)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // только положительные значения
            $table->integer('age')->unsigned();
        });
    } </pre>
    @elseif($id == 9)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // только положительные значения
            $table->string('name')->first()->change();
        });
    } </pre>
    @elseif($id == 10)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
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
            // переименовываем поля name и surname
            $table->string('name', 'first-name');
            $table->renameColumn('surname', 'second-name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // переименовываем поля name и surname
            $table->renameColumn('first-name', 'name');
            $table->renameColumn('second-name', 'surname');
        });
    }
 } </pre>
    @endif
    <a href="/migrations/migration-fields">Назад</a>
</x-layout>
