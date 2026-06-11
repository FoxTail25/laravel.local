<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    <h2>
        Запуск миграций в Laravel
    </h2>
    <div>
        Давайте теперь научимся запускать миграции. Пусть для примера у нас есть следующая тестовая миграция, создающая
        таблицу с постами (приведенные команды мы еще будем изучать в следующих уроках):
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
				$table->id();
				$table->string('name');
				$table->text('text');
			});
		}

		public function down()
		{
			Schema::dropIfExists('posts');
		}
	}</pre>
        Давайте применим нашу миграцию. Для этого нужно выполнить artisan команду migrate:
        <pre>
php artisan migrate</pre>
    </div>
    <a href="/migrations/running-task/1">Задача 1</a>

</x-layout>
