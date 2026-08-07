<x-layout>
    <x-slot:title>
        Контроллеры в Laravel
    </x-slot:title>
    <h2>
        Controllers (Контроллеры) в Laravel
    </h2>
    <h3>
        Введение
    </h3>
    Как правило маршруты, создаваемые в файле routes/web.php не будут сами обрабатывать запрос, а отправят его на
    определенное действие заданного контроллера.
    <br />
    Контроллеры размещаются в папке app/Http/Controllers. Давайте для примера сделаем какой-нибудь контроллер, например,
    PostController.
    <br />
    Для этого в папке с контроллерами создадим файл с классом контроллера, подчиняющийся правилам автозагрузки классов.
    <br />
    Нашему контроллеру соответствует файл <b>app/Http/Comtrollers/PostController.php</b>. Давайте создадим его и в этом
    файле разместим следующий
    код:
    <pre>&lt;?php
	namespace App\Http\Controllers;

	class PostController extends Controller
	{

	}</pre>
    Давайте теперь создадим действие, то есть метод нашего контроллера:
    <pre>&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			return 'hello world';
		}
	}</pre>
    Таким образом у нас есть контроллер и его действие. В следующем уроке мы научимся делать так, чтобы по обращению к
    определенному URL вызывалось заданное действие некоторого контроллера.
    <x-page.content.task.head :data="['controllers_task1', 'Задача:']" />
    <x-page.content.task.body href='controllers-task' :tasks="[
        1 => [
            'text' => 'Создайте контроллер UserController и в нем сделайте действие show.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Маршруты для контроллеров в Laravel
    </h3>
    Давайте теперь в файле с роутами будем делать так, чтобы маршруты обрабатывались заданными контроллерами.
    <br />
    Для этого вторым параметром метода get нужно передать массив, состоящий из двух элементов: имени контроллера с его
    пространством имен и имени действия. Общая схема выглядит так:
    <pre>//path routes/web.php

    &lt;?php
	Route::get(маршрут, [полное имя контроллера, имя действия]);</pre>
    Давайте зададим маршрут, который будет вызывать метод show нашего контроллера PostController:
    <pre>//path routes/web.php

    &lt;?php
	Route::get('/post', ['App\\Http\\Controllers\\PostController', 'show']);</pre>
    Как вы видите, указывать имя контроллера в виде строки не очень удобно. Это длинно и нужно удваивать слеши в
    пространстве имен (т.к. это строка). Существует более удобный (и общепринятый способ). Давайте его разберем.
    <pre>//path routes/web.php

    &lt;?php
	use App\Http\Controllers\PostController;</pre>
    После этого мы сможем воспользоваться статическим свойством класса ::class. Модифицируем наш маршрут:
    <pre>//path routes/web.php

    &lt;?php
	Route::get('/post', [PostController::class, 'show']);
    </pre>
    <x-page.content.task.head :data="['controllers_task2', 'Задачи:']" />
    <x-page.content.task.body href='controllers-task' :tasks="[
        2 => [
            'text' =>
                'Сделайте так, чтобы при обращении на адрес /user вызывалось действие show контроллера UserController.',
        ],
        3 => [
            'text' =>
                'Сделайте так, чтобы при обращении на адрес /controll/user/all вызывалось действие all контроллера UserController.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Генерация контроллеров в Laravel
    </h3>
    Создавать контроллеры вручную не очень эффективно. Лучше использовать для этого генератор кода artisan. Он
    автоматически создаст файл с нужным классом и пропишет в нем пространство имен и нужные зависимости.
    <br />
    Давайте для примера создадим CityController:
    <pre>php artisan make:controller CityController</pre>
    <x-page.content.task.head :data="['controllers_task3', 'Задачи:']" />
    <x-page.content.task.body href='controllers-task' :tasks="[
        4 => [
            'text' => 'С помощью artisan создайте контроллер ArticleController.',
        ],
        5 => [
            'text' => 'С помощью artisan создайте контроллер CategoryController.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Параметры маршрутов в контроллерах Laravel
    </h3>
    Давайте теперь добавим к нашему маршруту параметр:
    <pre>//path routes/web.php

    &lt;?php
	Route::get('/post/{id}', [PostController::class, 'show']);</pre>
    Переданный параметр будет попадать в параметр метода нашего действия:
    <pre>&lt;?php
	class PostController extends Controller
	{
		public function show($id)
		{
			return 'post ' . $id;
		}
	}</pre>
    <x-page.content.task.head :data="['controllers_task4', 'Задачи:']" />
    <x-page.content.task.body href='controllers-task' :tasks="[
        6 => [
            'text' => 'Сделайте маршрут, обрабатывающий адреса вида controll/user/:name.',
        ],
        7 => [
            'text' => 'Сделайте маршрут, обрабатывающий адреса вида controll/user/:surname/:name.',
        ],
    ]" />
    <br />
    <br />
    <h3>
        Применение параметров маршрутов в Laravel
    </h3>
    Рассмотрим некоторое практическое применение параметров маршрутов. Давайте в зависимости от значения параметра будем
    отдавать различный текст.
    <br />
    Пусть у нашего маршрута есть параметр:
    <pre>&lt;?php
	Route::get('/post/{id}', [PostController::class, 'show']);</pre>
    Пусть также в действии контроллера хранится массив, в котором ключами будут значения параметра, а значениями -
    соответствующие тексты:
    <pre>&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			$posts = [
				1 => 'текст 1',
				2 => 'текст 2',
				3 => 'текст 3',
				4 => 'текст 4',
				5 => 'текст 5',
			];
		}
	}</pre>
    Давайте отдадим в браузер текст, соответствующий значению параметра:
    <pre>&lt;?php
	class PostController extends Controller
	{
		public function show($id)
		{
			$posts = [
				1 => 'текст 1',
				2 => 'текст 2',
				3 => 'текст 3',
				4 => 'текст 4',
				5 => 'текст 5',
			];

			return $posts[$id];
		}
	}</pre>
    <x-page.content.task.head :data="['controllers_task5', 'Задачи:']" />
    У нас есть следующий массив:
    <pre>	$users = [
		'user1' => 'city1',
		'user2' => 'city2',
		'user3' => 'city3',
		'user4' => 'city4',
		'user5' => 'city5',
	];</pre>

    <x-page.content.task.body href='controllers-task' :tasks="[
        8 => [
            'text' =>
                'Создайте маршрут, который параметром будет принимать имя юзера, а в браузером результатом отправлять его город.',
        ],
        9 => [
            'text' =>
                'Сделайте так, чтобы, если параметром передано несуществующее имя, в браузер выводилось сообщение об этом.',
        ],
    ]" />
    <br />
    <br />
</x-layout>
