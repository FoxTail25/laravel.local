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
</x-layout>
