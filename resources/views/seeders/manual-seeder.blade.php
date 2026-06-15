<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    <h2>
        Seeders в Laravel
    </h2>
    <h4>
        Ручное заполнение таблиц через сидеры в Laravel
    </h4>
    Давайте теперь пропишем в нашем сидере команды на заполнение какой-нибудь таблицы.
    <br />
    Для начала нам нужно заюзать фасад DB позволяющий осуществлять вставку данных:
    <pre>
    &lt;?php
    use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB; // подключаем

	class DatabaseSeeder extends Seeder
	{
		public function run()
		{
			// команды
		}
	}</pre>
    Давайте теперь вставим в таблицу с постами новый пост. Это делается следующим образом:
    <pre>
    &lt;?php
    use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB; // подключаем

	class DatabaseSeeder extends Seeder
	{
		public function run()
		{
			DB::table('posts')->insert([
				'title' => 'title 1',
				'slug'  => 'post-1',
				'text'  => 'text text text 1',
			]);
		}
	}</pre>
    Можно вставить не одну запись, а сразу несколько:
    <pre>
    &lt;?php
    use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB; // подключаем

	class DatabaseSeeder extends Seeder
	{
		public function run()
		{
			DB::table('posts')->insert([
				[
					'title' => 'title 1',
					'slug'  => 'post-1',
					'text'  => 'text text text 1',
				],
				[
					'title' => 'title 2',
					'slug'  => 'post-2',
					'text'  => 'text text text 2',
				],
				[
					'title' => 'title 3',
					'slug'  => 'post-3',
					'text'  => 'text text text 3',
				],
			]);
		}
	}</pre>
    Теперь можно в терминале запустить команду на вставку данных из сидера:
    <pre>php artisan db:seed</pre>
    <a href="/seeders/manual-seeder-task/1">Задача 1</a>

    <h4>
        Генерация случайных строк в сидерах в Laravel
    </h4>
    Можно сделать так, чтобы Laravel генерировал случайные строки для того, чтобы не приходилось придумывать данные для
    вставки самостоятельно.
    <br />
    Для этого используется специальный класс Str. Давайте его заюзаем:
    <pre>
    &lt;?php
    namespace Database\Seeders;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Seeder;
	use Illuminate\Support\Str; // подключаем

	class DatabaseSeeder extends Seeder
	{
		public function run()
		{

		}
	}</pre>
    У этого класса есть статический метод random, генерирующий случайную строку заданной длины. Воспользуемся этим
    методом для генерации вставляемых строк:
    <pre>
    &lt;?php
    namespace Database\Seeders;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Seeder;
	use Illuminate\Support\Str; // подключаем

	class DatabaseSeeder extends Seeder
	{
		public function run()
		{
            DB::table('posts')->insert([
				'title' => Str::random(10),
				'slug'  => Str::random(10),
				'text'  => Str::random(50),
			]);
		}
	}</pre>
    </pre>
    <a href="/seeders/manual-seeder-task/2">Задача 2</a>
</x-layout>
