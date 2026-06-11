<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
            сначала создаётся сама миграция при помощи команды:
            <pre>
php artisan make:migration create_articles_table
            </pre>
            Далее мы идём в папку database/migration находим файл который оканчивается "...create_articles_table.php".
            Открываем файл и дописываем следующий код в метод up()
            <pre>
&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
	{
		public function up()
		{
			Schema::create('articles', function (Blueprint $table) {
				$table->('id');
				$table->string('header');
				$table->text('content');
			});
		}

		public function down()
		{
			Schema::dropIfExists('posts');
		}
	}</pre>
        </div>
    @elseif ($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            сначала создаётся сама миграция при помощи команды:
            <pre>
php artisan make:migration create_users_table
            </pre>
            Далее мы идём в папку database/migration находим файл который оканчивается "...create_users_table.php".
            Открываем файл и дописываем следующий код в метод up()
            <pre>
&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
	{
		public function up()
		{
			Schema::create('users', function (Blueprint $table) {
				$table->('id');
				$table->string('name',100);
				$table->string('surname',100);
				$table->date('birth_day');
				$table->timestamp('created_up');
			});
		}

		public function down()
		{
			Schema::dropIfExists('posts');
		}
	}</pre>
        </div>
    @endif
    <a href="/migrations/tables-fields">Назад</a>

</x-layout>
