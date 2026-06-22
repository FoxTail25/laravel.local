<x-layout>
    <x-slot:title>
        INSERT, UPDATE, DELETE в DB в Laravel
    </x-slot:title>

    <h2>
        INSERT, UPDATE, DELETE в DB в Laravel
    </h2>
    <h3>
        Вставка данных через DB в Laravel
    </h3>
    Для вставки данных используется метод insert. Он принимает параметром массив имен столбцов и значений:
    <pre>
    DB::table('posts')->insert([
		'title' => 'page',
		'slug'  => 'slug',
	]);
    </pre>
    <h3>
        Получение id
    </h3>
    Можно получить id вставленной записи, использовов для вставки метод insertGetId:
    <pre>
	$id = DB::table('posts')->insertGetId([
		'title' => 'page',
		'slug'  => 'slug',
	]);

	echo $id;
    </pre>
    <h3>
        Массовая вставка
    </h3>
    Можно вставить в таблицу сразу несколько записей одним вызовом insert. Давайте для примера вставим несколько постов.
    Для этого нужно передать параметром двухмерный массив:
    <pre>
	DB::table('posts')->insert([
		[
			'title' => 'page1',
			'slug'  => 'slug1',
		],
		[
			'title' => 'page2',
			'slug'  => 'slug2',
		]
	]);
    </pre>
    <h4 id="task1">Задачи:</h4>
    <a href="/DB/insert-update-del-task/1">
        Вставьте нового юзера в таблицу с юзерами.
    </a>
    <br />
    <a href="/DB/insert-update-del-task/2">
        Вставьте нового юзера в таблицу с юзерами. Выведите на экран id вставленного юзера.
    </a>
    <br />
    <a href="/DB/insert-update-del-task/3">
        Вставьте трех новых юзеров в таблицу с юзерами.
    </a>


</x-layout>
