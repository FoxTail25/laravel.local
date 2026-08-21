<x-layout>
    <x-slot:title>
        Form в Laravel
    </x-slot:title>

    <h3>
        Form в Laravel
    </h3>
    <hr />
    <h4>
        Объект Request в Laravel
    </h4>
    В данном разделе мы научимся работать с формами. Для получения данных формы в Laravel используется специальный
    объект запроса Request. Этот объект передается в контроллер с помощью инъекции зависимости. Давайте посмотрим, как
    это делается.
    <br />
    Пусть у нас есть контроллер:
    <pre>class PostController extends Controller
	{

	}</pre>
    Для начала подключим к нашему контроллеру класс Request:
    <pre>use Illuminate\Http\Request; // подключим класс Request

	class PostController extends Controller
	{

	}</pre>
    Теперь укажем объект запроса параметром действия, используя контроль типов:
    <pre>use Illuminate\Http\Request;

	class PostController extends Controller
	{
		public function show(Request $request) // передаем
			в действие
		{

		}
	}</pre>
    Laravel обнаружит, что мы хотим внедрить объект запроса в действие и автоматически передаст его в нужный параметр.
    <br />
    В результате в действии у нас будет доступна переменная $request, содержащая нужный нам объект запроса. Работать с
    ним мы и будем учится в следующих уроках.
    <x-page.content.task.head :data="['task1', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        1 => [
            'text' => 'Внедрите объект запроса в действие вашего контроллера.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Отправка форм методом GET в Laravel
    </h4>
    Давайте теперь научимся отправлять формы методом GET и получать их данные в контроллере. Сделаем для этого два
    метода контроллера. Первый метод будет показывать форму, а второй метод будет обрабатывать данные этой формы после
    ее отправки.
    <br />
    Для начала сделаем два роута. Первый роут для показа формы:
    <pre>Route::get('/form', [PostController::class, 'form']);</pre>
    Второй роут для обработки данных отправленной формы:
    <pre>Route::get('/result', [PostController::class, 'result']);</pre>
    Теперь в представлении сделаем нашу форму. В атрибуте action не забудем указать URL роута, который отвечает за
    обработку формы:
    <pre>
&lt;form action="/result">
	&lt;input name="title">
	&lt;input name="slug">
	&lt;input type="submit">
&lt;/form></pre>
    Давайте теперь сделаем действия в контроллере:
    <pre>class PostController extends Controller
	{
		public function result()
		{

		}

		public function form()
		{

		}
	}</pre>
    Действие form будет показывать форму:
    <pre>public function form()
	{
		return view('post.form');
	}</pre>
    А действие result будет обрабатывать данные отправленной формы. Для этого мы должны внедрить в него объект запроса:
    <pre>public function result(Request $request)
	{

	}</pre>
    Данные формы можно получить с помощью метода input объекта запроса. Параметром этот метод принимает имя инпута.
    Давайте получим и выведем отправленные данные:
    <pre>public function result(Request $request)
	{
		dump($request->input('title'));
		dump($request->input('slug'));
	}</pre>
    А теперь передадим данные нашей формы в представление:
    <pre>public function result(Request $request)
	{
		$title = $request->input('title');
		$slug  = $request->input('slug');

		return view('post.result', [
			'title' => $title, 'slug' => $slug
		]);
	}</pre>
    В представлении метода result выведем переданные переменные:
    <pre>&lt;h1>&#123;&#123; $title }}&lt;/h1>
&lt;p>&#123;&#123; $slug }}&lt;/p></pre>
    <x-page.content.task.head :data="['task2', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        2 => [
            'text' =>
                'Сделайте форму с тремя инпутами, в которые будут вводиться числа. После отправки формы найдите сумму введенных чисел и передайте ее в представление.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Отправка форм методом POST в Laravel
    </h4>
    Давайте теперь научимся отправлять формы методом POST. Внесем необходимые изменения. Для начала в роуте, отвечающем
    за обработку формы, поменяем метод get на метод post:
    <pre>Route::post('/result', [PostController::class, 'result']);</pre>
    Теперь в форме добавим атрибут method со значением POST:
    <pre>&lt;form action="/result" method="POST">
    &lt;input name="title">
    &lt;input name="slug">
    &lt;input type="submit">
&lt;/form></pre>
    Далее по правилам Laravel нам необходимо добавить защиту от CSRF атаки. Технически мы должны в нашу форму добавить
    специальный скрытый инпут, содержащий секретную строку (токен).
    <br />
    На практике нам просто нужно вставить специальную команду Blade:
    <pre>&lt;form action="/result" method="POST">
    &#64;csrf
    &lt;input name="title">
    &lt;input name="slug">
    &lt;input type="submit">
&lt;/form></pre>
    Это все изменения. Наш контроллер останется неизменным:
    <pre>class PostController extends Controller
	{
		public function result(Request $request)
		{
			$title = $request->input('title');
			$slug  = $request->input('slug');

			return view('post.result', [
				'title' => $title, 'slug' => $slug
			]);
		}

		public function form()
		{
			return view('post.form');
		}
	}</pre>
    <x-page.content.task.head :data="['task3', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        3 => [
            'text' =>
                'Сделайте форму, которая будет спрашивать имя, возраст и зарплату юзера. Отправьте эту форму методом POST.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Форма и ее обработка в одном действии в Laravel
    </h4>
    Давайте теперь сделаем одно действие и для показа формы, и для ее последующей обработки. Для этого в маршрутах мы
    должны разрешить обращение к методу контроллера и методом GET, и методом POST:
    <pre>Route::post('/form', [PostController::class, 'form']);
Route::get('/form', [PostController::class, 'form']);</pre>
    В приведенном выше коде у нас все дублируется, кроме имени метода HTTP запроса. В этом случае эти два роута можно
    объединить в один следующим образом:
    <pre>Route::match(['get', 'post'], '/form', [PostController::class, 'form']);</pre>
    В самой форме мы должны исправить значение атрибута action, чтобы форма отправлялась на текущую страницу:
    <pre>&lt;form action="" method="POST">
	&#64;csrf
	&lt;input name="title">
	&lt;input name="slug">
	&lt;input type="submit">
&lt;/form></pre>
    Давайте теперь реализуем наше действие. Его код будет выполнятся два раза. При первом заходе мы просто должны
    показать форму, а после ее отправки - обработать ее данные. Разрулим оба варианта с помощью условия. В этом нам
    поможет метод has, проверяющий наличие данных инпута в объекте запроса. Реализуем:
    <pre>class PostController extends Controller
	{
		public function form(Request $request)
		{
			if ($request->has('title') && $request->has('slug')) {
				dump($request->input('title'));
				dump($request->input('slug'));
			}

			return view('post.form');
		}
	}</pre>
    <x-page.content.task.head :data="['task4', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        4 => [
            'text' =>
                'С помощью формы спросите у пользователя его город и страну. После отправки формы выведите эти данные над формой в отдельном абзаце.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Данные формы в виде массива в Laravel
    </h4>
    Можно получить получить все данные формы в виде массива с помощью метода all:
    <pre>$data = $request->all();</pre>
    <x-page.content.task.head :data="['task5', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        5 => [
            'text' =>
                'Пусть в вашей форме есть произвольное количество инпутов. После отправки формы получите массив отправленных значений, отправьте его в представление и выведите эти данные в виде списка ul.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Получение части данных формы в Laravel
    </h4>
    Метод only позволяет получить массив, состоящий из значений перечисленных полей формы. Имена полей можно передавать
    в виде массива или перечислять через запятую.
    <br />
    Пусть, к примеру, была отправлена форма с полями 'title', 'slug', 'text', 'desc'. Давайте получим массив, состоящий
    из значений заданных полей:
    <pre>$data = $request->only(['title', 'text']);</pre>
    Имена полей можно передавать в виде массива либо перечислять через запятую, вот так:
    <pre>$data = $request->only('title', 'text');</pre>
    <x-page.content.task.head :data="['task6', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        6 => [
            'text' =>
                'С помощью формы спросите у пользователя его имя, фамилию, email, логин, пароль. Получите массив, содержащий имя и логин пользователя.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Исключение части данных формы в Laravel
    </h4>
    С помощью метода except можно исключить часть данных из запроса. Давайте, например, исключим поля 'text' и 'desc':
    <pre>$data = $request->except(['text', 'desc']);</pre>
    Метод except также позволяет перечислять имена полей через запятую:
    <pre>$data = $request->except('text', 'desc');</pre>
    <x-page.content.task.head :data="['task7', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        7 => [
            'text' =>
                'С помощью формы спросите у пользователя его имя, фамилию, email, логин, пароль. После отправки формы выведите на экран в виде списка ul все отправленные поля, кроме поля с паролем и email.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Сложные имена полей в формах в Laravel
    </h4>
    Иногда имена элементов форм могут представлять массивы, наподобие такого:
    <pre>&lt;form action="">
    &lt;input type="text" name="user[name]">
    &lt;input type="text" name="user[surname]">
    &lt;input type="submit">
&lt;/form></pre>
    Для получения значений таких инпутов вы можете использовать точечную запись для обращения к массивам:
    <pre>$name = $request->input('user.name');
$name = $request->input('user.surname');</pre>
    <h4>
        Внедрение зависимости и параметры маршрута в Laravel
    </h4>
    Бывают ситуации, когда в контроллер должны передаться параметры маршрута и при этом мы хотим внедрить зависимость.
    Давайте посмотрим, как действовать в этом случае.
    <br />
    Пусть у нас есть роут с параметром:
    <pre>Route::post('/post/{id}', [PostController::class, 'test']);</pre>
    Получим переданный параметр в действии контроллера:
    <pre>class PostController extends Controller
	{
		public function test($id)
		{

		}
	}</pre>
    Пусть нам в этом действии также понадобился объект запроса. В этом случае внедрение зависимости нужно провести до
    параметров:
    <pre>class PostController extends Controller
	{
		public function test(Request $request, $id)
		{

		}
	}</pre>
    {{-- <x-page.content.task.head :data="['task8', 'Задача:']" />
    <x-page.content.task.body href='form-object-request-task' :tasks="[
        8 => [
            'text' =>
                'Сделайте маршрут, в котором параметрами передаются id и логин юзера. Отравьте форму на этот маршрут. Получите и данные формы, и параметры маршрута.',
        ],
    ]" />
    <br />
    <br /> --}}

</x-layout>
