<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    <h2>
        Откат миграций в Laravel
    </h2>
    Мы уже знаем, что структура файла миграции должна выглядеть следующим образом:
    <pre>
&lt;?php
	class CreatePostsTable extends Migration
	{
		public function up()
		{

		}

		public function down()
		{

		}
	}</pre>
    В предыдущих уроках мы писали команды в методе up. Этот метод задает то, как наша база будет изменена при миграции.
    <br />
    В методе down следует писать команды, которые позволят описанную откатить миграцию. Т.е. команды которые вернут всё
    к тому, как было до миграции
    <br />
    Для примера давайте сделаем миграцию, создающую таблицу. Соответственно при откате миграции мы должны эту таблицу
    удалить:
    <pre>
&lt;?php
	class CreatePostsTable extends Migration
	{
		public function up()
		{
			Schema::create('posts', function (Blueprint $table) {

			});
		}

		public function down()
		{
			Schema::dropIfExists('posts');
		}
	}
    </pre>
    <a href="/migrations/migration-rollback-task/1">Задача 1</a>
    <a href="/migrations/migration-rollback-task/2">Задача 2</a>
    <a href="/migrations/migration-rollback-task/3">Задача 3</a>
    <a href="/migrations/migration-rollback-task/4">Задача 4</a>
    <a href="/migrations/migration-rollback-task/5">Задача 5</a>

    <h3>
        Откат последней миграциц
    </h3>
    С помощью следующей команды можно откатить последнюю миграцию:
    <pre>php artisan migrate:rollback</pre>
    <h3>
        Несколько шагов назад
    </h3>
    Можно сделать откат определенного числа миграций, указав параметр step для команды rollback. Например, следующая
    команда откатит последние пять миграций:
    <pre>php artisan migrate:rollback --step:5</pre>
    <h3>
        Отмена всех
    </h3>
    Следующая команда отменит изменения всех миграций вашего приложения:
    <pre>php artisan migrate:reset</pre>
    <h3>
        Перезапуск
    </h3>
    Следующая команда откатит все миграции, а затем выполнит их снова:
    <pre>php artisan migrate:refresh</pre>
    <h3>
        Принудительные миграции в продакшене в Laravel
    </h3>
    Некоторые операции миграций разрушительны, значит они могут привести к потере ваших данных. Для предотвращения
    случайного запуска этих команд на вашей боевой БД перед их выполнением запрашивается подтверждение. Для
    принудительного запуска команд без подтверждения используйте ключ --force:
    <pre>php artisan migrate --force</pre>
</x-layout>
