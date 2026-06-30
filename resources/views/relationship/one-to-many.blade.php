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
</x-layout>
