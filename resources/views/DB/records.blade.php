<x-layout>
    <x-slot:title>
        DB в Laravel
    </x-slot:title>

    <h2 id="record">
        Работа с записями в Laravel
    </h2>
    <h3>
        Получение всех записей через DB
    </h3>
    Давайте с помощью фасада DB получим все записи из таблицы posts:
    <pre>
&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			$posts = DB::table('posts')->get();
			dump($posts);
		}
	}</pre>
    Эти записи можно перебрать циклом:
    <pre>
&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			$posts = DB::table('posts')->get();

			foreach ($posts as $post) {
				dump($post);
			}
		}
	}
    </pre>
    Каждая запись представляет собой объект, свойствами которого служат поля таблицы БД:
    <pre>
&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			$posts = DB::table('posts')->get();

			foreach ($posts as $post) {
				dump($post->title);
				dump($post->text);
			}
		}
	}
    </pre>
    <a href="/DB/records-task/1">Задача 1</a>
    <h3>
        Поля выборки через DB в Laravel
    </h3>
    Не всегда нужно выбирать все столбцы из таблицы БД. С помощью метода select можно указать необходимые поля в
    выборке:
    <pre>$posts = DB::table('posts')->select('title', 'text')->get();</pre>
    <a href="/DB/records-task/2">Задача 1</a>
    <h3>
        Переименование столбцов
    </h3>
    При выборке можно осуществлять переименовывание столбцов. Давайте сделаем так, чтобы поле text в полученной выборке
    называлось post_text:
    <pre>
        $posts = DB::table('posts')->select('title', 'text as
		post_text')->get();
    </pre>
    <a href="/DB/records-task/3">Задача 1</a>
    <h3>
        Условия where при выборке через QB в Laravel
    </h3>
    При получении данных можно задавать условие на выборку. Это делается при помощи метода where. Давайте для примера с
    помощью этого метода получим все посты, количество лайков у которых равно 100:
    <pre>
        $posts = DB::table('posts')->where('likes', 100)->get();
    </pre>
    А теперь получим посты, у которых количество лайков больше 100:
    <pre>
        $posts = DB::table('posts')->where('likes', '>', 100)->
		get();
    </pre>
    А теперь получим посты, у которых количество лайков не равно 100:
    <pre>
        $posts = DB::table('posts')->where('likes', '!=', 100)->
		get();
    </pre>
    <a href="/DB/records-task/4">Задача 1</a>
    <a href="/DB/records-task/5">Задача 2</a>
    <a href="/DB/records-task/6">Задача 3</a>
    <a href="/DB/records-task/7">Задача 4</a>
    <a href="/DB/records-task/8">Задача 5</a>
    <h3>
        Несколько условий where при выборке через QB в Laravel
    </h3>
    В запросе можно написать несколько условий where. В этом случае они объединятся через логическое И. Давайте посмотрим на примере. Напишем следующий запрос:
    <pre>
        $posts = DB::table('posts')
            ->where('likes', '>', 10)
            ->where('likes', '<', 20)
            ->get();
    </pre>
    В результате к базе выполнится следующий запрос:
    <pre>
        SELECT * FROM posts WHERE likes > 10 AND likes < 20
    </pre>
    <a href="/DB/records-task/9">Задача 1</a>
    <h3>
        Условия orWhere при выборке через QB в Laravel
    </h3>
    С помощью метода orWhere можно объединять условия через логическое ИЛИ. Давайте посмотрим на примере:
    <pre>
 	$posts = DB::table('posts')
		->where('id', '=', 10)
		->orWhere('likes', '>', 10)
		->get();
    </pre>
    В результате к базе выполнится следующий запрос:
    <pre>
        SELECT * FROM posts WHERE id = 10 OR likes > 10
    </pre>
    <a href="/DB/records-task/10">Задача 1</a>
    <a href="/DB/records-task/11">Задача 2</a>
    <h3>
        Сложные условия при выборке через QB в Laravel
    </h3>
    При выборке можно конструировать условия любой сложности. Для этого в метод orWhere нужно параметром передать
    анонимную функцию, в которой будут писаться сгрупированные команды:
    <pre>
	$posts = DB::table('posts')
		->where('id', '=', 3)
		->orWhere(function($query) {
			// тут пишем сгрупированные команды
		})
	->get();
    </pre>
    Внутри функции будет доступен объект $query, к которому можно применять методы построителя запроса.
    <pre>
	$posts = DB::table('posts')
		->where('id', '=', 3)
		->orWhere(function($query) {
			$query
				->where('likes', '>', 10)
				->where('likes', '<', 50);
		})
	->get();
    </pre>
    В результате к базе выполнится следующий запрос:
    <pre>SELECT * FROM posts WHERE id = 3 OR (likes > 10 AND likes > 50)</pre>
    <a href="/DB/records-task/12">Задача 1</a>
    <h3>
        Получение одной строки через QB в Laravel
    </h3>
    Часто нам нужно получить из базы не массив строк, а одну строку. Для этого вместо метода get нужно воспользоваться
    методом first:
    <pre>
        $post = DB::table('posts')->where('id', 1)->first();
    </pre>
    <a href="/DB/records-task/13">Задача 1</a>
    <h3>
        Получение значения одного столбца через QB в Laravel
    </h3>
    Можно извлечь значение одной колонки определенного ряда. Для этого используется метод value. В следующем примере наш
    запрос найдет первую запись, подпадающую под условие и возьмет из нее значение поля title:
    <pre>
    $title = DB::table('posts')->where('id', '1')->value('title');
	echo $title;
    </pre>
    <h3>
        Получение коллекции значений столбца через QB в Laravel
    </h3>
    Можно получить коллекцию значений одного столбца, собранную со всех рядов. Для этого используется метод pluck:
    <pre>
	$titles = DB::table('posts')->pluck('title');
	dump($titles);
    </pre>
    Можно перебрать полученные данные циклом:
    <pre>
	$titles = DB::table('posts')->pluck('title');

	foreach ($titles as $title) {
		echo $title;
	}
    </pre>
    Можно получить не все посты, а только подпадающие под условие:
    <pre>
  	$titles = DB::table('posts')
		->where('id', '>', '3')
		->pluck('title');

	dump($titles);
    </pre>
    <a href="/DB/records-task/14">Задача TestModel</a>
</x-layout>
