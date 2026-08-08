<x-layout>
    <x-slot:title>
        Представления в Laravel
    </x-slot:title>
    <h2>
        Views (Представления) в Laravel
    </h2>
    <h3>
        Введение
    </h3>
    Как мы уже знаем, в окно браузера выводится то, что вернет действие через return:
    <pre>//path: app/Http/Comtrollers/PostController.php

&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			return 'text'; // выведется на экран
		}
	}</pre>
    В реальной жизни, однако, контроллеры не возвращают текст непосредственно, а подтягивают его из представления.
    <br />
    Представление представляет собой файл с HTML кодом. При этом обычно каждому действию контроллера соответствует свой
    файл.
    <br />
    Для того, чтобы получить представление, используется функция view. Эта функция параметром принимает название файла
    представления (без расширения) и возвращает его текст.
    <br />
    Файлы представления хранятся в папке resources/views. Давайте перейдем в эту папку и сделаем в ней файл
    test.blade.php с таким текстом:
    <pre>//path: resources/views/test.blade.php

&lt;!DOCTYPE html>
&lt;html>
	&lt;head>
		&lt;title>my view&lt;/title>
	&lt;/head>
	&lt;body>
		my view
	&lt;/body>
&lt;/html></pre>
    Как вы видите, наш файл test.blade.php имеет два расширения: первое .php и второе .blade. Второе расширение
    показывает Laravel то, что мы в нашем файле можем использовать команды шаблонизатора Blade. Пока мы просто написали
    HTML код без команд шаблонизатора, но скоро их добавим.
    <br />
    Давайте сделаем так, чтобы наше действие отправило в браузер текст созданного нами представления. Для этого действие
    должно вернуть результат работы функции view, в которой параметром мы укажем имя файла представления (только имя,
    без расширения):
    <pre>//path: app/Http/Comtrollers/PostController.php

&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			return view('test');
		}
	}</pre>
    <x-page.content.task.head :data="['views_task1', 'Задача:']" />
    <x-page.content.task.body href='views-task' :tasks="[
        1 => [
            'text' => 'Сделайте представление для какого-нибудь действия одного из ваших контроллеров.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Передача данных в представление Laravel
    </h3>
    Давайте теперь будем передавать какие-нибудь данные из контроллера в представление.
    <br />
    Для этого предназначен второй параметр функции view. В этот параметр мы можем передать ассоциативный массив. В
    представлении все ключи этого массива станут переменными, а элементы - значениями этих переменных.
    <br />
    Давайте посмотрим на примере. Передадим в представление какой-нибудь массив с данными:
    <pre>//path: app/Http/Comtrollers/PostController.php
&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			return view('test', ['var1' => '1', 'var2' => '2']);
		}
	}</pre>
    В результате в представлении будет доступна переменная $var1 со значением 1 и переменная $var2 со значением 2.
    <br />
    Для того, чтобы вывести содержимое переменной в представлении, нужно написать ее в двойных фигурных скобках. Сделаем
    это:
    <pre>//path: resources/views/view/task1.blade.php

&lt;!DOCTYPE html>
&lt;html>
	&lt;head>
		&lt;title>my view&lt;/title>
	&lt;/head>
	&lt;body>
		variable one: &#123;&#123; $var1 }}
		variable two: &#123;&#123; $var2 }}
	&lt;/body>
&lt;/html></pre>
    Шаблонизатор Blade вместо соответствующих команд подставит значения переменных и в браузер отправится следующий HTML
    код:
    <pre>//path: resources/views/view/task1.blade.php

&lt;!DOCTYPE html>
&lt;html>
	&lt;head>
		&lt;title>my view&lt;/title>
	&lt;/head>
	&lt;body>
		variable one: 1
		variable two: 2
	&lt;/body>
&lt;/html></pre>
    <x-page.content.task.head :data="['views_task2', 'Задача:']" />
    <x-page.content.task.body href='views-task' :tasks="[
        2 => [
            'text' =>
                'Пусть в действии контроллера даны переменные $name и $surname. Передайте значения этих переменных в представление и выведите содержимое каждой из этих переменных на экран.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Структура файлов представлений в Laravel
    </h3>
    Сейчас файл с нашим представлением хранится непосредственно в папке resources/views. Более принято, однако, для
    представлений каждого контроллера создавать свою подпапку, а в этой подпапке размещать файлы представлений для
    действий.
    <br />
    Посмотрим на примере. Пусть наш контроллер имеет название PostController, а наше действие - show. Это значит, что
    внутри папки resources/views нужно создать папку post, а в ней файл show.blade.php, соответствующий нашему действию.
    <br />
    Имя представления, которое мы передаем параметром функции view, теперь должно содержать две части: имя папки post и
    имя файла show. Эти части разделяются точкой. Давайте исправим код нашего контроллера в соответствии с описанным:
    <pre>//path app/Http/Controllers/PostController.php
&lt;?php
	class PostController extends Controller
	{
		public function show()
		{
			return view('post.show');
		}
	}
    </pre>
    <br />
    <br />

    <h3>
        Макет сайта в Laravel
    </h3>
    В представлениях контроллера обычно размещают не весь макет сайта, а только его изменяющийся контент. А макет сайта
    выносят в отдельный файл, в который автоматически в специальное место будет вставляться контент страницы.
    <br />
    Давайте сделаем это. Разместим код общего макета сайта в следующем файле:
    <pre>//path resources/views/components/layout.blade.php
&lt;!DOCTYPE html>
&lt;html>
	&lt;head>
		&lt;title>title&lt;/title>
	&lt;/head>
	&lt;body>
		тут подключается контент
	&lt;/body>
&lt;/html></pre>
    В этом файле будет доступна специальная переменная $slot, которая указывает место вставки контента. Давайте
    воспользуемся ею:
    <pre>//path resources/views/components/layout.blade.php
&lt;!DOCTYPE html>
&lt;html>
	&lt;head>
		&lt;title>title&lt;/title>
	&lt;/head>
	&lt;body>
		&#123;&#123; $slot }}
	&lt;/body>
&lt;/html></pre>
    <x-page.content.task.head :data="['views_task3', 'Задача:']" />
    <x-page.content.task.body href='views-task' :tasks="[
        3 => [
            'text' => 'Описанным способом сделайте файл с макетом сайта.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Контент в макете сайта в Laravel
    </h3>
    Давайте теперь исправим представление контроллера. Уберем в нем лишний код, оставив только контент сайта:
    <pre>//path: resources/views/post/show.blade.php
    page content</pre>
    Теперь с помощью специального тега &lt;x-layout> обернем текст нашего представление. Содержимое этого тега и будет
    вставлено в макет сайта вместо переменной $slot:
    <pre>//path: resources/views/post/show.blade.php
    &lt;x-layout>
	page content
&lt;/x-layout></pre>
    <x-page.content.task.head :data="['views_task4', 'Задача:']" />
    <x-page.content.task.body href='views-task' :tasks="[
        4 => [
            'text' => 'Сделайте представление для метода show контроллера User.',
        ],
        5 => [
            'text' => 'Сделайте так, чтобы это представление выводилось в общем макете сайта.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Тайтл в макете сайта в Laravel
    </h3>
    Давайте теперь в макете сайта укажем место, в которое будет вставлен тайтл страницы. Это делается с помощью
    переменной $title:
    <pre>//path resources/views/components/layout.blade.php
&lt;!DOCTYPE html>
&lt;html>
	&lt;head>
		&lt;title>&#123;&#123; $title }}&lt;/title>
	&lt;/head>
	&lt;body>
		&#123;&#123; $slot }}
	&lt;/body>
&lt;/html></pre>
    Теперь в представлении контроллера зададим текст нашего тайтла. Это делается с помощью тега &lt;x-slot> следующим
    образом:
    <pre>//path: resources/views/post/show.blade.php
    &lt;x-layout>
    &lt;x-slot:title>
		page title
	&lt;/x-slot>
	page content
&lt;/x-layout></pre>
    <br />
    <br />

    <h3>
        Контент из переменной в Laravel
    </h3>
    Пусть теперь текст контента не прописан жестко в представлении, а передается из контроллера:
    <pre>&lt;?php
    class PostController extends Controller
    {
        public function show()
        {
            return view('post.show', [
                'text' => 'page content',
                ]);
            }
        }</pre>
    Давайте выведем переданный текст в представлении:
    <pre>&lt;x-layout>
	&lt;x-slot:title>
		page title
	&lt;/x-slot>

	&#123;&#123; $text }}
&lt;/x-layout></pre>
    Абсолютно так же можно делать и с title

    <x-page.content.task.head :data="['views_task5', 'Задача:']" />
    <x-page.content.task.body href='views-task' :tasks="[
        6 => [
            'text' =>
                'В контроллере с юзерами сделайте три метода и представления к ним. В каждом представлении разместите свой тайтл и контент. Через браузер обратитесь к созданным методам. Убедитесь, что все работает.',
        ],
    ]" />
</x-layout>
