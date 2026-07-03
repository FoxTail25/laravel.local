<x-layout>
    <x-slot:title>
        Связи в моделях Eloquent
    </x-slot:title>

    <h2>
        Связи в моделях Eloquent в Laravel
    </h2>
    <hr />
    <h3>
        Многие ко многим в Laravel
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
    <div class="text-danger">
        По соглашению Laravel (Convention over Configuration), имя промежуточной таблицы должно состоять из имен
        связываемых моделей в единственном числе, нижнем регистре и в алфавитном порядке.
    </div>

    <h4>
        3 главных правила Laravel для pivot-таблиц
    </h4>
    <ol>
        <li>
            <b>Имя таблицы в алфавитном порядке: </b> Имена моделей связываются в единственном числе через
            подчеркивание.
            <ol>
                <li>apple + banana = apple_banana (A перед B)</li>
                <li>user + role = role_user (R перед U)</li>
            </ol>
        </li>
        <li>
            <b>Имена колонок-ключей: </b> Название модели в единственном числе + суффикс _id.
            <br />
            apple_id, employee_id, product_id
        </li>
        <li>
            <b>Типы данных должны совпадать: </b>
            Поля user_id и role_id в pivot-таблице обязаны иметь тип BIGINT UNSIGNED, так как именно этот тип Laravel
            использует по умолчанию для обычных id. Метод foreignId() делает это автоматически.
        </li>
    </ol>
    <h4>
        Два правильных способа написать миграцию
    </h4>
    <b>
        Вариант 1. Стандартный (Подходит для 90% задач)
    </b>
    Этот вариант идеален, если вам нужно просто связать две сущности и, возможно, фиксировать время, когда связь была
    создана. Мы оставляем автоинкрементный id.
    <pre>
    Schema::create('role_user', function (Blueprint $table) {
        $table->id(); // Главный ключ самой pivot-таблицы

        // Внешние ключи с каскадным удалением
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('role_id')->constrained()->onDelete('cascade');

        // Временные метки (опционально)
        $table->timestamps();
    });</pre>
    <b>
        Вариант 2. С составным ключом (Чистый и строгий)
    </b>
    Используйте его, если вам точно не нужны будут временные метки timestamps, и вы хотите на уровне базы данных
    запретить дублирование связей (чтобы нельзя было дать пользователю одну и ту же роль дважды).
    <pre>
    Schema::create('role_user', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('role_id')->constrained()->onDelete('cascade');

        // Назначаем комбинацию этих двух полей главным ключом таблицы
        $table->primary(['user_id', 'role_id']);
    });</pre>
    <div class="text-success">
        <h4>
            ⚡Лайфхак для ускорения разработки
        </h4>
        Если у вас установлен популярный пакет генераторов laracasts/generators:
        <br />
        Чтобы не писать всю миграцию руками с нуля, в Laravel (начиная с 11 версии) есть потрясающая встроенная команда
        Artisan. Она сама создаст файл миграции с правильным именем и правильной структурой.
        <pre>php artisan make:migration:pivot user role</pre>
        Laravel сам поймет алфавитный порядок, создаст таблицу role_user и сразу пропишет внутри неё внешние ключи
        user_id и
        role_id с каскадным удалением.
        <br />
        ...без пакет генераторов laracasts/generators Artisan выдает ошибку.
    </div>
    <h3>
        Практические задачи
    </h3>
    Пусть у нас есть сотрудники и их профессии. Каждый сотрудник может иметь несколько профессий. Так же как и каждой
    профессией может владеть несколько сотрудников. Даны соответствующие таблицы:
    <h4>
        emlpoyee
    </h4>
    <ul>
        <li>id</li>
        <li>name</li>
    </ul>
    <h4>
        profession
    </h4>
    <ul>
        <li>id</li>
        <li>name</li>
    </ul>
    <h4 id="task1">
        Задачи:
    </h4>
    <a href="/relationship/many-to-many-task/1">
        Таблица employee у нас уже есть. Теперь нам нужно создать таблицу professions и таблицу связи. А так же
        заполнить их данными.
    </a>
    <br />

</x-layout>
