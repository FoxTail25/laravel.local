<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    <h3>
        Запуск миграций в Laravel
    </h3>
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
    <x-page.content.task.head :data="['migrations-running-task1', 'Задача:']" />
    <x-page.content.task.body href='migration-running-tasks' :tasks="[
        1 => [
            'text' =>
                'Сделайте миграцию, создающую таблицу с юзерами. Примените ее. Откройте PMA и убедитесь, что ваша миграция применилась.',
        ],
    ]" />
    <br />
    <br />
    {{-- <a href="/migrations/running-task/1">Задача 1</a> --}}

</x-layout>
