<x-layout>
    <x-slot:title>
        Ленивая и жадная загрузки в Laravel
    </x-slot:title>

    <h2>
        Ленивая и жадная загрузки в Laravel
    </h2>
    Связанные модели в Laravel загружаются отложено. Это значит, что SQL запрос выполняется в момент обращения к объекту
    модели. Это на самом деле плохо, так как выполняется большое количество запросов к базе. (та самая проблема N+1)
    Давайте посмотрим на примере.
    <br />
    Пусть у нас таблица с категориями связана с таблицей с постами отношением hasMany. Давайте для нашей категории
    переберем циклом коллекцию ее постов. В результате SQL запрос будет отправляться каждую итерацию цикла:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);

			foreach ($category->posts as $post) {
				dump($post); // тут каждый раз шлется запрос
			}
		}
	}</pre>
    Для решения проблемы мы можем использовать жадную (нетерпеливую) загрузку. С помощью метода with мы можем заранее
    подгрузить данные связанной модели. Давайте сделаем это:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::with(['post'])->first();
		}
	}</pre>
    Теперь при переборе циклом лишних запросов не будет:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::with(['post'])->first();

			foreach ($category->posts as $post) {
				dump($post);
			}
		}
	}</pre>
    <div class="text-danger">
        Небольшое дополнение!
        <br />
        Метод all() в Eloquent — это статический метод, который нельзя вызывать по цепочке после методов построителя
        запросов (таких как with()). По этому надо использовать get() или first().
        <br />
        Имя передаваемое в with() === Имя, под которым записан метод в модели!!
        В прошлой задаче, мы создали модель Profession:
        <pre>
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Profession extends Model
    {
        public function employees(){
            return $this->belongsToMany(Employee::class);
        }
    }</pre>
        Теперь, если мы будем использовать "жадную" загрузку этой модели, то наш код будет выглядеть вот так:
        <pre>Profession::with(['employees'])->get();</pre> Имя, передаваемое в with(['']) === имя метода модели!!!
    </div>
    <h4 id="task1">
        Задачи:
    </h4>
    <a href="/relationship/load-task/1">
        Выберите несколько задач из предыдущих уроков и переделайте их код на жадную загрузку.
    </a>
    <br />
    <h3>
        Жадная загрузка множественных отношений в Laravel
    </h3>
    Пусть у нас есть таблица с комментами, в который каждый коммент связан со своим постом и со своим юзером:
    <h5>
        comments
    </h5>
    <ul>
        <li>id</li>
        <li>text</li>
        <li>post_id</li>
        <li>user_id</li>
    </ul>
    Пропишем эту связь:
    <pre>
	class Comment extends Model
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
    Давайте получим все комменты:
    <pre>
	class CommentController extends Controller
	{
		public function show()
		{
			$comments = Comment::all();
			dump($comments);
		}
	}</pre>
    Переберем комменты циклом и в цикле для каждого коммента будем получать его пост и его юзера:
    <pre>
	class CommentController extends Controller
	{
		public function show()
		{
			$comments = Comment::all();

			foreach ($comments as $comment) {
				dump($comment);
				dump($comment->post);
				dump($comment->user);
			}
		}
	}</pre>
    В этом случае в каждой итерации цикла будут выполнятся лишние SQL запросы. Давайте исправим проблему, заранее
    загрузив данные двух связанных моделей:
    <pre>
	class CommentController extends Controller
	{
		public function show()
		{
			$comments = Comment::with(['post', 'user'])->get();

			foreach ($comments as $comment) {
				dump($comment);
				dump($comment->post);
				dump($comment->user);
			}
		}
	}</pre>
    <h4 id="task2">
        Задачи:
    </h4>
    <a href="/relationship/load-task/2">
        Придумайте аналогичную задачу со своими таблицами и реализуйте ее.
    </a>
    <h3>
        Жадная загрузка по умолчанию в Laravel
    </h3>
    Иногда требуется постоянная загрузка некоторых отношений при извлечении модели. Для этого нужно определить свойство
    $with в модели.
    <br />
    Для примера давайте сделаем так, чтобы категории всегда загружались вместе со своими постами:
    <pre>
	class Category extends Model
	{
		protected $with = ['posts'];

		public function posts()
		{
			return $this->hasMany(Post::class);
		}
	}</pre>
    Теперь при переборе постов лишнего запроса не будет:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);

			foreach ($category->posts as $post) {
				dump($post); // лишнего запроса не будет
			}
		}
	}</pre>
    <h3>
        Документация про связи моделей в Laravel
    </h3>
    В предыдущих уроках я рассказал вам основные виды связей моделей и операций с этими связями. Я намеренно опускал
    часть теории, чтобы не перегружать вас лишней информацией. Подробное описание работы связывания вы найдете в <a
        href="https://github.com/russsiq/laravel-docs-ru/blob/9.x/docs/eloquent-relationships.md">документации.</a>
</x-layout>
