<x-layout>
    <x-slot:title>
        Связи в моделях Eloquent
    </x-slot:title>

    <h3>
        Связь один ко многим в Laravel
    </h3>

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
    <pre>use App\Models\Post;

	class Category extends Model
	{

	}</pre>
    Каждая категория имеет много постов, которые ссылаются на нее. Давайте в модели с категориями сделаем метод для
    получения постов:
    <pre>use App\Models\Post;

	class Category extends Model
	{
		public function posts()
		{

		}
	}</pre>
    Пропишем в этом методе связь через отношение hasMany:
    <pre>class Category extends Model
	{
		public function posts()
		{
			return $this->hasMany(Post::class);
		}
	}</pre>
    <x-page.content.task.head :data="['task1', 'Задачи:']" />
    <x-page.content.task.body href='relationship-one-to-many-task' :tasks="[
        1 => [
            'text' =>
                'Сделайте следующие таблицы:<br/><h5>cities</h5><ul><li>id</li>         <li>name</li><li>country_id</li></ul><h5>countries</h5><ul><li>id</li><li>name</li></ul>',
        ],
        2 => [
            'text' => 'Свяжите таблицу countries с таблицей cities отношением hasMany.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Получение данных связь один ко многим в Laravel
    </h4>
    В предыдущем уроке мы связали категории и их посты отношением hasMany. Давайте теперь в контроллере получим
    какую-нибудь категорию:
    <pre>class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);
			dump($category);
		}
	}</pre>
    Вместе с категорией мы автоматически получим коллекцию постов:
    <pre>class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);
			dump($category->posts); // коллекция постов
		}
	}</pre>
    Давайте переберем коллекцию с постами через цикл:
    <pre>class CategoryController extends Controller
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
    <pre>class CategoryController extends Controller
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
	}</pre>
    <x-page.content.task.head :data="['task2', 'Задача:']" />
    <x-page.content.task.body href='relationship-one-to-many-task' :tasks="[
        3 => [
            'text' => 'Для таблиц, созданных в предыдущем уроке получите все страны вместе с их городами.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Условия в связи один ко многим в Laravel
    </h4>
    Можно добавлять дополнительные условия при получении связанных данных. Давайте посмотрим, как это делается. Пусть у
    нашей таблицы с постами будет также и поле likes, содержащее количество лайков:
    <h5>
        posts
    </h5>
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
    <x-page.content.task.head :data="['task3', 'Задача:']" />
    <x-page.content.task.body href='relationship-one-to-many-task' :tasks="[
        4 => [
            'text' => 'Добавьте поле population в таблицу cities и заполните рандомным числом от 80 000 до 120 000',
        ],
        5 => [
            'text' => 'Получите все страны вместе с их городами, население в которых больше 100 тысяч.',
        ],
        6 => [
            'text' =>
                'Получите все страны вместе с их городами. Города каждой страны отсортируйте по возрастанию населения.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Обратная связь один ко многим в Laravel
    </h4>
    Пусть у нас опять есть таблица с категориями и таблица с постами. В предыдущих уроках мы говорили, что каждая
    категория имеет много постов. Но это зависит от точки зрения.
    <br />
    Если посмотреть со стороны поста, то каждый пост принадлежит одной категории. Это значит, что пост можно связать с
    категорией отношением belongsTo. Давайте сделаем это:
    <pre>class Post extends Model
	{
		public function category()
		{
			return $this->belongsTo(Category::class);
		}
	}</pre>
    Получим теперь пост вместе с его категорией:
    <pre>class PostController extends Controller
	{
		public function show()
		{
			$post = Post::find(1);
			dump($post);
			dump($post->category);
		}
	}</pre>
    Получим все посты, переберем их циклом и выведем их вместе с их категориями:
    <pre>class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();

			foreach ($posts as $post) {
				dump($post);
				dump($post->category);
			}
		}
	}</pre>
    <x-page.content.task.head :data="['task4', 'Задача:']" />
    <x-page.content.task.body href='relationship-one-to-many-task' :tasks="[
        7 => [
            'text' => 'Свяжите таблицу cities с таблицей countries отношением belongsTo.',
        ],
        8 => [
            'text' => 'Получите город вместе с его страной.',
        ],
        9 => [
            'text' => 'Получите все города вместе с их странами.',
        ],
        10 => [
            'text' => 'Получите все города с населением больше 100 тысяч вместе с их странами.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Несколько обратных связей один ко многим в Laravel
    </h4>
    Может такое быть, что одна таблица имеет несколько связей. Давайте посмотрим, как действовать в таком случае.
    <br />
    Пусть у нас есть таблица с постами:
    <h5>posts</h5>
    <ul>
        <li>id</li>
        <li>title</li>
    </ul>
    Таблица с юзерами:
    <h5>users</h5>
    <ul>
        <li>id</li>
        <li>name</li>
    </ul>
    И пусть у нас есть таблица с комментами, в который каждый коммент связан со своим постом и со своим юзером:
    <h5>comments</h5>
    <ul>
        <li>id</li>
        <li>text</li>
        <li>post_id</li>
        <li>user_id</li>
    </ul>
    Давайте пропишем эту связь в модели для комментов:
    <pre>class Comment extends Model
	{
		public function post()
		{
			return $this->belongsTo(Post::class);
		}
		public function user()
		{
			return $this->belongsTo(User::class);
		}
	}</pre>
    Теперь при получении коммента мы можем получить его пост и его юзера:
    <pre>class CommentController extends Controller
	{
		public function show()
		{
			$comment = Comment::find(1);
			dump($comment);
			dump($comment->post);
			dump($comment->user);
		}
	}</pre>
    <x-page.content.task.head :data="['task5', 'Задача:']" />
    <x-page.content.task.body href='relationship-one-to-many-task' :tasks="[
        11 => [
            'text' =>
                'сделайте (и заполните) следующие таблицы:<br/><h4>employees</h4><ul>  <li>id</li><li>name</li><li>city_id</li><li>position_id</li></ul><h4>positions</h4><ul><li>id</li><li>name</li></ul>',
        ],
        12 => [
            'text' => 'Свяжите сотрудника (employee) с его городом и с его должностью отношением belongsTo.',
        ],
        13 => [
            'text' => 'Получите сотрудника вместе с его городом и должностью.',
        ],
    ]" />
    <br />
    <br />

</x-layout>
