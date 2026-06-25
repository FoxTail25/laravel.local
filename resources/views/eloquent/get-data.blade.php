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
	}
    </pre>
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
	}
    </pre>
</x-layout>
