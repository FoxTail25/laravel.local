<x-layout>
    <x-slot:title>
        Получение данных из моделей Eloquent в Laravel
    </x-slot:title>

    <h2>
        Получение данных из моделей Eloquent в Laravel
    </h2>
    С помощью статического метода all можно получить все записи из таблицы. Давайте обратимся к модели Post и получим
    все данные из таблицы posts в виде коллекции:
    <pre>
    class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();
			dump($posts); // коллекция
		}
	}</pre>
    Каждый объект в коллекции будет принадлежать классу модели Post. Давайте переберем коллекцию циклом и обратимся к
    каждому объекту по отдельности:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();

			foreach ($posts as $post) {
				dump($post); // объект класса Post
			}
		}
	}</pre>
    Каждый объект представляет собой одну запись (строку, Row) в таблице. Свойствами этого объекта служат поля таблицы:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();

			foreach ($posts as $post) {
				dump($post->title);
				dump($post->text);
			}
		}
	}</pre>
    <x-page.content.task.head :data="['task1', 'Задача:']" />
    <x-page.content.task.body href='eloquent-get-data-task' :tasks="[
        1 => [
            'text' => 'Получите всех юзеров. Передайте юзеров в представление и выведите их в виде HTML таблицы.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Получение одной записи в моделях Eloquent в Laravel
    </h3>
    С помощью конструктора запросов можно получить одну запись. Для этого нужно использовать комбинацию методов where и
    first:
    <pre>
	$post = Post::where('id', 1)->first();
	dump($post);
    </pre>
    <p class="text-danger">->first() возвращает ОДИН объект (или null)Он достает из базы данных ровно одну запись.
        Если
        в базе никого нет, он вернет null.
    <ul>
        <li>
            Тип данных: Объект класса App\Models\User или null.
        </li>
        <li>
            Как обращаться к полям: Напрямую через стрелочку: $user->name
        </li>
    </ul>
    </p>
    <p class="text-danger">->get() возвращает КОЛЛЕКЦИЮ (коробку / массив)Он всегда возвращает специальный
        объект-коллекцию Laravel,
        внутри которого лежат найденные пользователи. Если в базе никого нет, он все равно вернет коллекцию, просто
        она будет пустой.
    <ul>
        <li>
            Тип данных: Объект класса Illuminate\Database\Eloquent\Collection.
        </li>
        <li>Как обращаться к полям:
            Напрямую через стрелочку нельзя. Сначала нужно запустить цикл &#64;foreach ($users as $user) и уже внутри
            него писать $user->name.
        </li>
    </ul>
    </p>
    <x-page.content.task.head :data="['task2', 'Задача:']" />
    <x-page.content.task.body href='eloquent-get-data-task' :tasks="[
        2 => [
            'text' =>
                'Получите юзера с возрастом 30. Передайте его в представление. Выведите данные этого юзера в отдельных тегах.',
        ],
    ]" />
    <br />
    <br />


    <h3>
        Получение записей по id в моделях Eloquent в Laravel
    </h3>
    С помощью специального метода find можно получить запись по ее id. Смотрите пример:
    <pre>
	$post = Post::find(1); // получаем запись с id 1
	dump($post);
    </pre>
    Можно получить группу записей, передав их id в виде массива:
    <pre>
	$posts = Post::find([1, 2, 3]);
	dump($posts);
    </pre>
    Важный нюанс: если какого-то ID из списка не окажется в базе, Laravel не выдаст ошибку, а просто вернет коллекцию из
    тех пользователей, которых удалось найти.
    <x-page.content.task.head :data="['task3', 'Задача:']" />
    <x-page.content.task.body href='eloquent-get-data-task' :tasks="[
        3 => [
            'text' =>
                'Получите юзера с id, равным 3. Передайте его в представление. Выведите данные этого юзера в отдельных тегах.',
        ],
        4 => [
            'text' => 'Получите юзеров с id, равными 3, 4 и 5.',
        ],
    ]" />
    <br />
    <br />


    <h3>
        Конструктор запросов в моделях Eloquent в Laravel
    </h3>
    <p class="text-danger">
        Все методы, доступные в конструкторе запросов, также доступны при работе с моделями Eloquent.
    </p>
    <br />
    Смотрите пример:
    <pre>
	$posts = Post::where('id', '>', 3)->get();
	dump($posts);
    </pre>
    <x-page.content.task.head :data="['task4', 'Задача:']" />
    <x-page.content.task.body href='eloquent-get-data-task' :tasks="[
        5 => [
            'text' =>
                'Получите всех юзеров с возрастом 30. Передайте юзеров в представление и выведите их в виде HTML таблицы.',
        ],
        6 => [
            'text' => 'Получите всех юзеров с зарплатой от 1000 до 3000.',
        ],
        7 => [
            'text' => 'Получите всех юзеров, начиная с четвертого.',
        ],
        8 => [
            'text' => 'Получите 5 юзеров, начиная с четвертого.',
        ],
        9 => [
            'text' => 'Получите всех юзеров с id, равным 1, 3, 4 или 5.',
        ],
    ]" />

</x-layout>
