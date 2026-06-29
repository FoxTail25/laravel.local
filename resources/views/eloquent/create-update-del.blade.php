<x-layout>
    <x-slot:title>
        Запись Eloquent в Laravel
    </x-slot:title>

    <h2>
        Запись, изменение и удаление данных в Eloquent в Laravel
    </h2>
    <hr>
    <h3>
        Ручное создание новой записи в моделях Eloquent в Laravel
    </h3>
    С помощью моделей можно не только получать записи из базы, но и создавать новые. Это делается в красивом ООП стиле.
    <br />
    <ol>
        <li>
            Для начала нужно создать новый экземпляр объекта модели:
            <pre>
        $post = new Post;</pre>
        </li>
        <li>
            Затем нужно записать в его свойства нужные данные:
            <pre>
        $post->title = 'title';
        $post->text  = 'text text text';</pre>
        </li>
        <li>
            После этого можно вызвать метод save для сохранения данных в базу:
            <pre>
        $post->save();</pre>
        </li>
    </ol>
    Собрав всё вместе получаем:
    <pre>
        use App\Models\Post;
        // 1. Создаем пустой объект в оперативной памяти
        $post = new Post;

        // 2. Заполняем свойства
        $post->title = 'title';
        $post->text  = 'text text text';

        // 3. Сохраняем в базу данных (только теперь выполнится SQL-запрос INSERT)
        $post->save();</pre>
    <div class="text-success">
        При описанном сохранении поля created_at и updated_at будут установлены автоматически.
    </div>
    <ul>
        <li><b>Плюсы: </b>Абсолютная безопасность. Защита $fillable здесь не действует, вы можете принудительно
            переписать любое поле.</li>
        <li><b>Минусы: </b>Много однотипного кода, если полей в таблице действительно много.</li>
    </ul>
    <h4 id="task1">
        Задачи:
    </h4>
    <a href="/eloquent/create-update-del-task/1">
        Добавьте нового юзера в вашу базу данных.
    </a>
    <h3>
        Изменение записи в моделях Eloquent в Laravel
    </h3>
    Метод save можно использовать и для изменения существующей модели в БД. Для изменения модели вам нужно получить ее,
    изменить необходимые атрибуты и вызвать метод save:
    <pre>
	$post = Post::find(1);
	$post->title = 'new title';

	$post->save();</pre>
    <p class="text-success">
        Отметка времени updated_at будет установлена автоматически.
    </p>
    <h4 id="task2">
        Задачи:
    </h4>
    <a href="/eloquent/create-update-del-task/2">
        Измените имя пользователя с id = 1
    </a>
    <h3>
        Удаление записей в моделях Eloquent в Laravel
    </h3>
    Метод delete можно использовать для удаления записей:
    <pre>
	$post = Post::find(1);
	$post->delete();
    </pre>
    Не обязательно получать модель в переменную, можно просто продолжить цепочку:
    <pre>
    Post::find(1)->delete();
    </pre>
    Можно, конечно же, удалить не одну запись, а целую группу по условию:
    <pre>
    $deletedRows = Post::where('id', '>', 3)->delete();
    </pre>
    <h4 id="task3">
        Задачи:
    </h4>
    <a href="/eloquent/create-update-del-task/3">
        Удалите из базы пользователя с максимальным id
    </a>
    <h3>
        Удаление записей по id в моделях Eloquent в Laravel
    </h3>
    Удалять записи можно не получая их, а вызвав статический метод destroy, передав ему id удаляемой записи:
    <pre>Post::destroy(1);</pre>
    Можно удалить сразу несколько записей, передав параметром массив их id:
    <pre>Post::destroy([1, 2, 3]);</pre>
    Можно не передавать массив, а просто указать удаляемые id через запятую:
    <pre>Post::destroy(1, 2, 3);</pre>
    <div class="text-success">
        <b>
            Важный нюанс про User::destroy() vs $user->delete()
        </b>
        <br />
        Стоит обратить внимание на одно архитектурное отличие, которое может всплыть на собеседовании или при код-ревью:
    </div>
    <ul>
        <li>
            Когда мы вызывали $user->delete(), Laravel сначала загружал модель в память, а затем удалял. При этом
            срабатывали обсервации и события модели (например, deleting и deleted).
        </li>
        <li>
            Метод User::destroy($id) делает прямой SQL-запрос DELETE FROM users WHERE id = .... Он работает быстрее, но
            если у вас к модели пользователя привязаны какие-то автоматические действия (например, удаление его аватара
            или связанных постов через события модели), при destroy() они не выполнятся. Если в вашем проекте этого нет,
            то код отработает отлично.
        </li>
    </ul>
    <h4 id="task4">
        Задачи:
    </h4>
    <a href="/eloquent/create-update-del-task/4">
        Удалите юзера с максимальным id.
    </a>
    <br />
    <a href="/eloquent/create-update-del-task/5">
        Удалите юзеров с тремя последними id.
    </a>
    <h3>
        Мягкое удаление в моделях Eloquent в Laravel
    </h3>
    Кроме обычного удаления Eloquent также может мягко удалять записи. Мягкое удаление означает, что запись на самом
    деле остаётся в базе данных, но в таблице для записи устанавливается поле deleted_at.
    <br />
    Что бы в Ларавель12 включить механизм "мягкого удаления" Необходимо сделать две вещи:
    <ol>
        <li>
            <b>
                Добавить колонку "мягкого удаления" в миграцию таблицы.
            </b>
            <br />
            (Базе данных нужно поле, куда Laravel будет
            записывать время удаления.)
            Если мы только создаём таблицу (через Schema::create):
            <pre>
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        // Создает nullable-колонку `deleted_at` с типом TIMESTAMP
        $table->softDeletes();
        $table->timestamps();
    });</pre>
            Если таблица <b>уже создана</b>, то необходимо создать миграцию (php artisan make:migration
            add_soft_deletes_to_users_table) для апргейда этой таблицы:
            <pre>
public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); // Добавляет deleted_at
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Удаляет deleted_at при откате
        });
    }</pre>
            После этого останется только выполнить миграцию командой
            <pre>php artisan migrate</pre>
        </li>
        <li>
            <b>
                Подклаем трейт в модели
            </b>
            <br />
            <pre>
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes; // 1. Импортируем

    class User extends Model
    {
        use SoftDeletes; // 2. Подключаем внутри класса

        protected $fillable = ['name', 'email'];
    }</pre>
        </li>
    </ol>
    <b>Теперь всё готово к использованию механизма "мягкого удаления"!</b>
    Теперь стандартные методы Laravel автоматически перестроят свою логику:
    <ul>
        <li>
            <b>
                Обычное удаление:
            </b>
            метод $user->delete() больше не сотрет строку, а запишет текущую дату в deleted_at.
        </li>
        <li>
            <b>
                Обычная выборка:
            </b>
            запросы вроде User::all() или User::find() автоматически игнорируют «удаленных» пользователей.
        </li>
    </ul>
    <b>
        Полезные методы для работы с мягким удалением:
    </b>
    <pre>
    // Получить ВСЕХ пользователей, включая мягко удаленных
    $allUsers = User::withTrashed()->get();

    // Получить ТОЛЬКО удаленных пользователей
    $trash = User::onlyTrashed()->get();

    // Восстановить мягко удаленного пользователя (очистит поле deleted_at)
    $user->restore();

    // Удалить НАВСЕГДА (физически стереть строку из базы данных)
    $user->forceDelete();
        </pre>

</x-layout>
