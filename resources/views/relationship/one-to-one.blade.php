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
        <h5>
            users_r
        </h5>
        <ul>
            <li>id</li>
            <li>login</li>
            <li>password</li>
        </ul>
        <h5>
            profile
        </h5>
        <ul>
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
        Получите какого-нибудь юзера вместе с его профилем. Отправьте полученного юзера в представление и выведите его
        данные в таблице.
    </a>
    <h3>
        Перебор записей со связью один к одному в Laravel
    </h3>
    Давайте теперь получим не один пост, а несколько, и перебем их циклом:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();

			foreach ($posts as $post) {
				dump($post->title);
			}
		}
	}</pre>
    При переборе для каждого поста также будет доступно свойство thumbnail, содержащее миниатюру:
    <pre>
	class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();

			foreach ($posts as $post) {
				dump($post->thumbnail);
			}
		}
	}</pre>
    Давайте выведем какие-нибудь данные нашей миниатюры:
    <pre>
    class PostController extends Controller
	{
		public function show()
		{
			$posts = Post::all();

			foreach ($posts as $post) {
				dump($post->thumbnail->path);
				dump($post->thumbnail->alt);
			}
		}
	}</pre>
    <h4 id="task3">
        Задачи:
    </h4>
    <a href="/relationship/one-to-one-task/5">
        Получите всех пользователей вместе с их профилями, передайте их в представление и выведите на экран в виде HTML
        таблицы.
    </a>
    <h3>
        Обратная связь один к одному в Laravel
    </h3>
    В предыдущих уроках у нас была связь один к одному между постом и миниатюрой. Такая связь может трактоваться двояко:
    каждый пост имеет свою миниатюру или каждая миниатюра принадлежит посту.
    <br />
    Разница между имеет и принадлежит проявляется в том, в какой таблице находится поле связи. В нашем случае поле связи
    - post_id, и находится оно таблице с миниатюрами.
    <br />
    Это значит, что пост имеет миниатюру. Но и миниатюра в свою очередь принадлежит посту. На практике это означает, что
    можно получить миниатюру вместе с ее постом. Для этого нужно связать модель миниатюр с моделью постов через
    отношение belongsTo. Давайте сделаем это:
    <pre>
	class Thumbnail extends Model
	{
		public function post()
		{
			return $this->belongsTo(Post::class);
		}
	}</pre>
    После этого при получении миниатюры можно будет получить ее пост:
    <pre>
	class ThumbnailController extends Controller
	{
		public function show()
		{
			$thumbnail = Thumbnail::find(1);
			dump($thumbnail);
			dump($thumbnail->post);
		}
	}</pre>
    авайте получим какое-нибудь поле связанного поста:
    <pre>
	class ThumbnailController extends Controller
	{
		public function show()
		{
			$thumbnail = Thumbnail::find(1);
			dump($thumbnail->post->title);
		}
	}</pre>
    <h4 id="task4">
        Задачи:
    </h4>
    <a href="/relationship/one-to-one-task/6">
        Свяжите таблицы с юзерами и профилями отношением belongsTo.
    </a>
    <br />
    <a href="/relationship/one-to-one-task/7">
        Получите профиль вместе с его юзером.
    </a>
    <br />
    <a href="/relationship/one-to-one-task/8">
        Получите все профили вместе с их юзерами. Выведите их в представлении в виде HTML таблицы.
    </a>

</x-layout>
