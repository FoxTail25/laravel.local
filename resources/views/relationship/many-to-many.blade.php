<x-layout>
    <x-slot:title>
        Связи в моделях Eloquent
    </x-slot:title>

    <h2>
        Связи в моделях Eloquent в Laravel
    </h2>
    <h3>
        Связь многие ко многим в Laravel
    </h3>
    Пусть каждый пост может принадлежать нескольким категориям. В этом случае они будут связаны через промежуточную
    таблицу связи.
    <br />
    Давайте посмотрим на структуру таблиц. Таблица с постами:
    <h4>
        posts
    </h4>
    <ul>
        <li>id</li>
        <li>title</li>
    </ul>
    <h4>
        categories
    </h4>
    <ul>
        <li>id</li>
        <li>name</li>
    </ul>
    <h4>category_post</h4>
    <ul>
        <li>id</li>
        <li>post_id</li>
        <li>category_id</li>
    </ul>
    <h4>Первая связь</h4>
    Каждый пост принадлежит многим категориям. Давайте пропишем эту связь через отношение belongsToMany:
    <pre>
	class Post extends Model
	{
		public function categories()
		{
			return $this->belongsToMany(Category::class);
		}
	}</pre>
    Получим пост с всете с его категориями:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$post = Post::find(1);
			dump($post->categories);
		}
	}</pre>
    <h4>
        Вторая связь
    </h4>
    Каждая категория принадлежит многим постам. Давайте пропишем эту связь через отношение belongsToMany:
    <pre>
	class Category extends Model
	{
		public function posts()
		{
			return $this->belongsToMany(Post::class);
		}
	}</pre>
    Получим категорию вместе с ее постами:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);
			dump($category->posts);
		}
	}
    </pre>
</x-layout>
