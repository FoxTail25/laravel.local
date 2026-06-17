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
    <a href="/seeders/manual-seeder-task/2">Задача 1</a>
    <h4>
        Хеширование паролей в сидерах в Laravel
    </h4>
    Таблица с юзерами в Laravel особенная. По ней осуществляется авторизация пользователей. Для этого в таблице должно
    быть поле password, содержащее хеш пароля.
    <br />
    Поэтому при генерации юзеров мы должны вместо паролей вставлять хеши этих паролей. Давайте сделаем это. Для начала
    подключим фасад Hash для хеширования пароля:
    <pre>
&lt;?php
	use Illuminate\Support\Facades\Hash

	class DatabaseSeeder extends Seeder
	{
	    public function run()
	    {

	    }
	}</pre>
    Теперь с помощью метода make при вставке нового юзера захешируем придуманный нами пароль:
    <pre>
&lt;?php
	class DatabaseSeeder extends Seeder
	{
		public function run()
		{
			DB::table('users')->insert([
				'name' => Str::random(10),
				'email' => Str::random(10).'@gmail.com',
				'password' => Hash::make('12345'),
			]);
		}
	}
    </pre>
    <a href="/seeders/manual-seeder-task/3">Задача 1</a>

    <h4>
        Отдельные классы сидеров в Laravel
    </h4>
    Не обязательно размещать все сидеры в одном классе DatabaseSeeder. Их можно разносить по разным классам.
    <br />
    Сидеры можно создавать вручную (создать и назвать файл, прописать его содержимое.) Либо можно использовать artisan
    <br />
    <span class="red">
        В laravel принято использовать единственное число для названия сидера
    </span>
    <pre>php artisan make:seeder PostSeeder</pre>

    Сделаем, к примеру, сидер для заполнения таблицы с постами:
    <pre>
    &lt;?php
    	namespace Database\Seeders;

	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Str;

	class PostSeeder extends Seeder
	{
		public function run()
		{

		}
	}</pre>
    Запустим его отдельно следующей командой:
    <pre>php artisan db:seed --class=PostSeeder</pre>
    </pre>
    <a href="/seeders/manual-seeder-task/4">Задача 1</a>
    <a href="/seeders/manual-seeder-task/5">Задача 2</a>
    <a href="/seeders/manual-seeder-task/6">Задача 3</a>


    <h4>
        Общий вызов отдельных сидеров в Laravel
    </h4>
    Удобно разбивать сидеры по отдельным файлам, но не очень удобно вызывать каждый сидер по-отдельности. Для упрощения
    можно в DatabaseSeeder прописать автоматический вызов всех отдельных сидеров.
    <br />
    Пусть, к примеру, у нас есть два отдельных сидера: PostSeeder и CommentSeeder. Давайте вызовем их в основном сидере.
    Для этого сначала заюзать наши отдельные сидеры:
    <pre>
    &lt;?php
    	namespace Database\Seeders;

	use PostSeeder;
	use CommentSeeder;
	class PostSeeder extends Seeder
	{
        public function run()
		{
            // А теперь пропишем их вызов с помощью специального метода call:
			$this->call([
				PostSeeder::class,
				CommentSeeder::class,
			]);
		}
	}</pre>
    Теперь можно запустить все прописанные сидеры с помощью уже известной вам команды на запуск основного сидера:
    <pre>php artisan db:seed</pre>
    </pre>
    <a href="/seeders/manual-seeder-task/7">Задача 1</a>

    <h4>
        Полное перестроение БД в Laravel
    </h4>
    Можно полностью перестроить базу данных, заново выполнив все миграции и сидеры. Это делается с помощью следующей
    команды:
    <pre>php artisan migrate:fresh --seed</pre>

    <h4>
        Тестовые таблицы в Laravel
    </h4>
    Давайте создадим и наполним тестовые таблицы, которыми мы будем пользоваться в следующих разделах учебника при
    изучении работы с базами данных:
    <h5 style="text-align: center">posts</h5>
    <ul>
        <li>id</li>
        <li>title(varchr)</li>
        <li>slug(varchr)</li>
        <li>likes(integer)</li>
        <li>created_at(datetime)</li>
        <li>updated_at(datetime)</li>
    </ul>
    <h5 style="text-align: center">users</h5>
    <ul>
        <li>id</li>
        <li>name(varchr)</li>
        <li>email(varchr)</li>
        <li>age(integer)</li>
        <li>salary(integer)</li>
        <li>created_at(datetime)</li>
        <li>updated_at(datetime)</li>
    </ul>
    <a href="/seeders/manual-seeder-task/8">Задача 1</a>

</x-layout>
