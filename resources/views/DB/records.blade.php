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
</x-layout>
