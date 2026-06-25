<x-layout>
    <x-slot:title>
        Создание и подключение моделей в Laravel
    </x-slot:title>

    <h2>
        Создание и подключение моделей в Laravel
    </h2>
    <h3>Создание моделей</h3>
    Для создания файлов моделей используются команды artisan. Давайте для примера создадим модель Post:
    <pre>php artisan make:model Post</pre>
    В результате будет создан следующий файл:
    <pre>
	namespace App;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Post extends Model
	{

	}</pre>
    <p class="text-danger">В Laravel принято что модели именуются в единственном числе(Post). А таблицы во множественном
        числе (posts)
    </p>
    <h4 id="task1">Задачи:</h4>
    <a href="/eloquent/create-and-use-task/1">
        С помощью artisan сгенерируйте модель для таблицы cities.
    </a>
    <br />
    <a href="/eloquent/create-and-use-task/2">
        В папке app/Models скореее всего уже есть модель User. Удалите или переместите её в другое место. C помощью
        artisan заново
        сгенерируйте модель для таблицы users.
    </a>
    <h3>
        Подключение модели Eloquent к контроллеру в Laravel
    </h3>
    После того, как создан файл с классом модели, эту модель можно использовать в контроллере для получения и изменения
    данных.
    <br />
    Для этого нужно подключить класс модели к контроллеру с помощью команды use:
    <pre>
	use App\Models\Post;

	class PostController extends Controller
	{

	}</pre>
    После подключения модели мы можем использовать ее внутри методов контроллера:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			// тут можно пользоваться моделью
		}
	}
    </pre>
    <h4 id="task2">Задачи:</h4>
    <a href="/eloquent/create-and-use-task/3">
        Подключите модель Users к вашему контроллеру.
    </a>
    <br />
</x-layout>
