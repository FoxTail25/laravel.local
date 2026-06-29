<x-layout>
    <x-slot:title>
        Связи в моделях Eloquent
    </x-slot:title>

    <h2>
        Связи в моделях Eloquent в Laravel
    </h2>
    <h3>
        Связь один к одному в Laravel
    </h3>
    Связь один к одному - это когда одна запись одной таблицы соответствует одной записи другой таблицы.
    <br />
    В качестве примера, можно присти человека и его паспорт. У каждого человека только один паспорт. И каждый паспорт
    принадлежит только одному человеку.
    <br />
    Рассмотрим подроблее на другом примере. Пусть у нас есть таблица с постами:
    <ul>
        <h5>
            posts
        </h5>
        <li>id</li>
        <li>title</li>
    </ul>
    Каждый пост, имеет только 1 картинку-миниатюру. При этом, картинки хранятся в отдельной таблице:
    <ul>
        <h5>
            thumbnails
        </h5>
        <li>id</li>
        <li>path</li>
        <li>alt</li>
        <li>post_id</li>
    </ul>
    Таблица с миниатюрами связана с таблицей с постави через поле post_id. Так как одному посту соответствует только
    одна миниатюра, то у нас получается связь <b><i>один к одному</i></b>. Мы можем прописать эту связь в моделях наших
    таблиц. Тоогда при получении поста, вместе с ним втоматически будет получаться и миниатюра.
    <br />
    Давайте сделаем это. Создадим модель для миниатюр:
    <pre>
	class Thumbnail extends Model
	{

	}
    </pre>
    Создадим модель для постов:
    <pre>
	class Post extends Model
	{

	}
    </pre>
    Заюзаем в модели для постов модель для миниатюр:
    <pre>
	use App\Models\Thumbnail;

	class Post extends Model
	{

	}
    </pre>
    В модели для постов создадим метод thumbnail:
    <pre>
	use App\Models\Thumbnail;
	class Post extends Model
	{
		public function thumbnail()
		{

		}
	}
    </pre>
    В этом методе свяжем наши модели через метод hasOne:
    <pre>
	use App\Models\Thumbnail;
	class Post extends Model
	{
		public function thumbnail()
		{
			return $this->hasOne(Thumbnail::class);
		}
	}
    </pre>
    <div class="text-danger">
        <h4>
            Соглашение
        </h4>
        Все связи в Laravel работают через соглашение: имена таблиц всегда даются во множественном числе, а поля связи -
        в единственном.
    </div>
    <h4 id="task1">
        Задачи:
    </h4>
    <a href="/relationship/one-to-one-task/1">
        Сделайте следующие таблицы:
        <ul>
            <h5>
                users_r
            </h5>
            <li>id</li>
            <li>login</li>
            <li>password</li>
        </ul>
        <ul>
            <h5>
                profile
            </h5>
            <li>id</li>
            <li>name</li>
            <li>surname</li>
            <li>email</li>
            <li>user_id</li>
        </ul>
    </a>
    <br />
    <a href="/relationship/one-to-one-task/2">
        Свяжите эти таблицы отношением hasOne.
    </a>
    <br />
    <a href="/relationship/one-to-one-task/3">
        Напишите сидер для заполнения данных в таблицах user_r и profile. И заполните их.
    </a>
    <h3>
        Получение данных связь один к одному в Laravel
    </h3>
    В предыдущем уроке мы связали посты и их миниатюры отношением hasOne. Давайте теперь в контроллере получим
    какой-нибудь пост:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$post = Post::find(1);
			dump($post);
		}
	}</pre>
    Этот пост, как вы уже знаете, будет представлять собой объект, в котором свойствами будут поля таблицы. Ввыведем, к
    примеру, содержимое поля title:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$post = Post::find(1);
			dump($post->title);
		}
	}</pre>
    В объекте с постом также появится свойство thumbnail. Имя этого свойства соответствует методу, который мы сделали в
    модели с постами для связывания моделей. Это свойство будет содержать объект с миниатюрой:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$post = Post::find(1);
			dump($post->thumbnail); // объект с миниатюрой
		}
	}</pre>
    Давайте выведем какое-нибудь поле нашей миниатюры:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$post = Post::find(1);
			dump($post->thumbnail->path);
		}
	}</pre>
    <h4 id="task2">
        Задачи:
    </h4>
    <a href="/relationship/one-to-one-task/4">
        Получите какого-нибудь юзера вместе с его профилем.
    </a>
</x-layout>
