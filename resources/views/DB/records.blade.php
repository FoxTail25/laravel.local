<x-layout>
    <x-slot:title>
        QueryBuilder в Laravel
    </x-slot:title>

    <h3 id="record">
        Работа с записями в Laravel
    </h3>
    <h4>
        Получение всех записей через DB
    </h4>
    Давайте с помощью фасада DB получим все записи из таблицы posts:
    <pre>&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			$posts = DB::table('posts')->get();
			dump($posts);
		}
	}</pre>
    Эти записи можно перебрать циклом:
    <pre>&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			$posts = DB::table('posts')->get();

			foreach ($posts as $post) {
				dump($post);
			}
		}
	}</pre>
    Каждая запись представляет собой объект, свойствами которого служат поля таблицы БД:
    <pre>&lt;?php
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
	}</pre>

    <h4>
        Поля выборки через QueryBuilder в Laravel
    </h4>
    Не всегда нужно выбирать все столбцы из таблицы БД. С помощью метода select можно указать необходимые поля в
    выборке:
    <pre>$posts = DB::table('posts')->select('title', 'text')->get();</pre>

    <x-page.content.task.head :data="['recordTask1', 'Задачи:']" />
    <x-page.content.task.body href='qb-records-task' :tasks="[
        1 => [
            'text' =>
                'Получите все записи из таблицы users. Переберите полученные записи циклом и выведите их в представлении в виде HTML таблицы',
        ],
        2 => [
            'text' => 'При получении данных из таблицы с юзерами оставьте в выборке только поля name и email',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Получение одной строки через QueryBuilder в Laravel
    </h4>
    Часто нам нужно получить из базы не массив строк, а одну строку. Для этого вместо метода get нужно воспользоваться
    методом first:
    <pre>$post = DB::table('posts')->first();</pre>
    <x-page.content.task.head :data="['recordsTask5', 'Задача:']" />
    <x-page.content.task.body href='qb-records-task' :tasks="[
        5 => [
            'text' => 'Получите одного юзера',
        ],
    ]" />
    <br />
    <br />


    <h4>
        Переименование столбцов
    </h4>
    При выборке можно осуществлять переименовывание столбцов. Давайте сделаем так, чтобы поле text в полученной выборке
    называлось post_text:
    <pre>$posts = DB::table('posts')->select('title', 'text as
		post_text')->get();</pre>
    <x-page.content.task.head :data="['recordTask2', 'Задача:']" />
    <x-page.content.task.body href='qb-records-task' :tasks="[
        3 => [
            'text' => 'При получении данных из таблицы с юзерами переименуйте поле email на user_email.',
        ],
    ]" />
    <br />
    <br />


    <h4>
        Получение коллекции значений столбца через QueryBuilder в Laravel
    </h4>
    Можно получить коллекцию значений одного столбца, собранную со всех рядов. Для этого используется метод pluck:
    <pre>$titles = DB::table('posts')->pluck('title');
	dump($titles);</pre>
    Можно перебрать полученные данные циклом:
    <pre>$titles = DB::table('posts')->pluck('title');

	foreach ($titles as $title) {
		echo $title;
	}</pre>
    Можно получить не все посты, а только подпадающие под условие:
    <pre>$titles = DB::table('posts')
    ->where('id', '>', '3')
    ->pluck('title');

dump($titles);</pre>
    <x-page.content.task.head :data="['recordTask3', 'Задача:']" />
    <x-page.content.task.body href='qb-records-task' :tasks="[
        4 => [
            'text' =>
                'Получите коллекцию имен всех юзеров. Передайте в представление коллекцию юзеров, полученную в предыдущей задаче. Выведите эти данные в виде списка ul.',
        ],
    ]" />
    <br />
    <br />


    <h4>
        Получение значения одного столбца через QueryBuilder в Laravel
    </h4>
    Можно извлечь значение одной колонки определенного ряда. Для этого используется метод value. В следующем примере наш
    запрос найдет первую запись, подпадающую под условие и возьмет из нее значение поля title:
    <pre>$title = DB::table('posts')->value('title');
echo $title;</pre>
    <h4>
        Проверка на NULL при выборке через QueryBuilder в Laravel
    </h4>
    Метод whereNull проверяет, что значения столбца равны NULL:
    <pre>$posts = DB::table('posts')
    ->whereNull('updated_at')
    ->get();

dump($posts);</pre>
    Метод whereNotNull проверяет, что значения столбца не равны NULL:
    <pre>$posts = DB::table('posts')
    ->whereNotNull('updated_at')
    ->get();

dump($posts);</pre>

    <h4>
        Количество записей в выборке через QueryBuilder в Laravel
    </h4>
    Метод take позволяет задать количество получаемых записей. Например, получим первые 5 записей:
    <pre>$posts = DB::table('posts')
    ->take(5)
    ->get();

dump($posts);</pre>

    <h4>
        Сдвиг при выборке через QueryBuilder в Laravel
    </h4>
    Метод skip позволяет задать сдвиг при выборке. Обязательно должен использоваться в комбинации с take. Давайте для
    примера получим пять записей, начиная с четвертой:
    <pre>$posts = DB::table('posts')
    ->skip(3)
    ->take(5)
    ->get();

dump($posts);</pre>
    <x-page.content.task.head :data="['recordTask6', 'Задачи:']" />
    <x-page.content.task.body href='qb-records-task' :tasks="[
        6 => [
            'text' => 'Получите первых 3 юзера.',
        ],
        7 => [
            'text' => 'Получите первых 3 юзера, начиная с 4го',
        ],
    ]" />
    <br />
    <br />


</x-layout>
