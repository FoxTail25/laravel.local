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

    <h3>
        Поля выборки через DB в Laravel
    </h3>
    Не всегда нужно выбирать все столбцы из таблицы БД. С помощью метода select можно указать необходимые поля в
    выборке:
    <pre>$posts = DB::table('posts')->select('title', 'text')->get();</pre>
    <h4 id="recordTask1">
        Задача
    </h4>
    <a href="/DB/records-task/1">
        Получите все записи из таблицы users. Переберите полученные записи циклом и выведите их в представлении в виде
        HTML таблицы.
    </a>
    <br />
    <a href="/DB/records-task/2">
        При получении данных из таблицы с юзерами оставьте в выборке только поля name и email.
    </a>
    <h3>
        Получение одной строки через DB в Laravel
    </h3>
    Часто нам нужно получить из базы не массив строк, а одну строку. Для этого вместо метода get нужно воспользоваться
    методом first:
    <pre>
        $post = DB::table('posts')->first();
    </pre>
    <h4 id="recordsTask5">
        Задача
    </h4>
    <a href="/DB/records-task/5">
        Получите одного юзера
    </a>
    <h3>
        Переименование столбцов
    </h3>
    При выборке можно осуществлять переименовывание столбцов. Давайте сделаем так, чтобы поле text в полученной выборке
    называлось post_text:
    <pre>
        $posts = DB::table('posts')->select('title', 'text as
		post_text')->get();
    </pre>
    <h4 id="recordTask2">
        Задача
    </h4>
    <a href="/DB/records-task/3">
        При получении данных из таблицы с юзерами переименуйте поле email на user_email.
    </a>

    <h3>
        Получение коллекции значений столбца через DB в Laravel
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
    <h4 id="recordTask3">
        Задача:
    </h4>
    <a href="/DB/records-task/4">
        Получите коллекцию имен всех юзеров. Передайте в представление коллекцию
        юзеров, полученную в предыдущей задаче. Выведите эти данные в виде списка ul.
    </a>

    <h3>
        Получение значения одного столбца через DB в Laravel
    </h3>
    Можно извлечь значение одной колонки определенного ряда. Для этого используется метод value. В следующем примере наш
    запрос найдет первую запись, подпадающую под условие и возьмет из нее значение поля title:
    <pre>
    $title = DB::table('posts')->value('title');
	echo $title;
    </pre>
    <h3>
        Проверка на NULL при выборке через DB в Laravel
    </h3>
    Метод whereNull проверяет, что значения столбца равны NULL:
    <pre>
	$posts = DB::table('posts')
		->whereNull('updated_at')
		->get();

	dump($posts);
    </pre>
    Метод whereNotNull проверяет, что значения столбца не равны NULL:
    <pre>
	$posts = DB::table('posts')
		->whereNotNull('updated_at')
		->get();

	dump($posts);
    </pre>


</x-layout>
