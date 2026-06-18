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
</x-layout>
