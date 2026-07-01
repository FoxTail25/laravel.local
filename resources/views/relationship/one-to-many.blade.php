<x-layout>
    <x-slot:title>
        Связи в моделях Eloquent
    </x-slot:title>

    <h2>
        Связи в моделях Eloquent в Laravel
    </h2>
    Давайте теперь изучим связь один ко многим. Такая связь образуется, когда запись одной таблицы соответствует многим
    записям из другой таблицы.
    <br />
    Давайте посмотрим на примере. Пусть у нас есть следующая таблица с категориями:
    <h5>
        category
    </h5>
    <ul>
        <li>id</li>
        <li>name</li>
    </ul>
    Пусть также у нас есть следующая таблица с постами:
    <h5>
        posts
    </h5>
    <ul>
        <li>id</li>
        <li>title</li>
        <li>category_id</li>
    </ul>
    Заюзаем в модели с категориями модель с постами:
    <div class="text-success">
        В Laravel12 это делать необязательно.
    </div>
    <pre>
	use App\Models\Post;

	class Category extends Model
	{

	}</pre>
    Каждая категория имеет много постов, которые ссылаются на нее. Давайте в модели с категориями сделаем метод для
    получения постов:
    <pre>
        	use App\Models\Post;

	class Category extends Model
	{
		public function posts()
		{

		}
	}</pre>
    Пропишем в этом методе связь через отношение hasMany:
    <pre>
	class Category extends Model
	{
		public function posts()
		{
			return $this->hasMany(Post::class);
		}
	}</pre>
    <h4 id="task1">
        Задачи:
    </h4>
    <a href="/relationship/one-to-many-task/1">
        Сделайте следующие таблицы:
        <h5>
            cities
        </h5>
        <ul>
            <li>id</li>
            <li>name</li>
            <li>country_id</li>
        </ul>
        <h5>
            countries
        </h5>
        <ul>
            <li>id</li>
            <li>name</li>
        </ul>
    </a>
    <br />
    <a href="/relationship/one-to-many-task/2">
        Свяжите таблицу countries с таблицей cities отношением hasMany.
    </a>
    <h3>
        Получение данных связь один ко многим в Laravel
    </h3>
    В предыдущем уроке мы связали категории и их посты отношением hasMany. Давайте теперь в контроллере получим
    какую-нибудь категорию:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);
			dump($category);
		}
	}</pre>
    Вместе с категорией мы автоматически получим коллекцию постов:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);
			dump($category->posts); // коллекция постов
		}
	}</pre>
    Давайте переберем коллекцию с постами через цикл:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);

			foreach ($category->posts as $post) {
				dump($post->title);
			}
		}
	}</pre>
    Давайте теперь получим коллекцию категорий. Переберем ее циклом, для каждой категории получим коллекцию постов и
    также переберем ее циклом:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$categories = Category::all();

			foreach ($categories as $category) {
				dump($category->name);

				foreach ($category->posts as $post) {
					dump($post->title);
				}
			}
		}
	}
    </pre>
    <h4 id="task2">
        Задачи:
    </h4>
    <a href="/relationship/one-to-many-task/3">
        Для таблиц, созданных в предыдущем уроке получите все страны вместе с их городами.
    </a>
    <h3>
        Условия в связи один ко многим в Laravel
    </h3>
    Можно добавлять дополнительные условия при получении связанных данных. Давайте посмотрим, как это делается. Пусть у
    нашей таблицы с постами будет также и поле likes, содержащее количество лайков:
    <h4>
        posts
    </h4>
    <ul>
        <li>id</li>
        <li>title</li>
        <li>likes</li>
        <li>category_id</li>
    </ul>
    Давайте для начала получим категорию вместе с коллекцией ее постов:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$posts = Category::find(1)->posts;
			dump($posts);
		}
	}</pre>
    Теперь заменим свойство posts на метод posts(). В этом случае метод своим результатом вернет построитель запросов
    (Query Builder):
    <pre>
    class CategoryController extends Controller
	{
		public function show()
		{
			$qb = Category::find(1)->posts();
			dump($qb);
		}
	}</pre>
    Так как возвращается построитель запросов, то мы можем дальше продолжить цепочку, к примеру, наложив некоторое
    условие на получаемые посты:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$posts = Category::find(1)
				->posts()
				->where('likes', '>', 10)
				->get();

			dump($posts);
		}
	}</pre>
    <h4 id="task3">
        Задачи:
    </h4>
    <a href="/relationship/one-to-many-task/4">
        Добавьте поле population в таблицу cities и заполните рандомным числом от 80 000 до 120 000
    </a>
    <br />
    <a href="/relationship/one-to-many-task/5">
        Получите все страны вместе с их городами, население в которых больше 100 тысяч.
    </a>
    <br />
    <a href="/relationship/one-to-many-task/6">
        Получите все страны вместе с их городами. Города каждой страны отсортируйте по возрастанию населения.
    </a>
    <h3>
        Обратная связь один ко многим в Laravel
    </h3>
    Пусть у нас опять есть таблица с категориями и таблица с постами. В предыдущих уроках мы говорили, что каждая
    категория имеет много постов. Но это зависит от точки зрения.
    <br />
    Если посмотреть со стороны поста, то каждый пост принадлежит одной категории. Это значит, что пост можно связать с
    категорией отношением belongsTo. Давайте сделаем это:
    <pre>
	class Post extends Model
	{
		public function category()
		{
			return $this->belongsTo(Category::class);
		}
	}</pre>
    Получим теперь пост вместе с его категорией:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$post = Post::find(1);
			dump($post);
			dump($post->category);
		}
	}
    </pre>
    Получим все посты, переберем их циклом и выведем их вместе с их категориями:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();

			foreach ($posts as $post) {
				dump($post);
				dump($post->category);
			}
		}
	}
    </pre>
</x-layout>
