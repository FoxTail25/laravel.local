<x-layout>
    <x-slot:title>
        INSERT, UPDATE, DELETE в QueryBuilderв Laravel
    </x-slot:title>

    <h2>
        INSERT, UPDATE, DELETE в QueryBuilderв Laravel
    </h2>
    <h3>
        Вставка данных через QueryBuilderв Laravel
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

    <h3>Обновление данных через QueryBuilderв Laravel</h3>
    Для изменения данных используется метод update. Он принимает параметром массив имен столбцов и значений.
    <br />
    Давайте обновим запись с указанным id:
    <pre>
	DB::table('posts')->where('id', 1)->update([
		'title' => 'page',
		'slug'  => 'slug',
	]);
    </pre>
    Теперь обновим заданную группу записей:
    <pre>
	DB::table('posts')->where('id', '>', 5)->update([
		'title' => 'page',
		'slug'  => 'slug',
	]);
    </pre>
    А теперь обновим вообще все записи:
    <pre>
	DB::table('posts')->update([
		'title' => 'page',
		'slug'  => 'slug',
	]);
    </pre>
    <p style="color:red;">!!Оказалось, что в ответ возвращается количество изменённых записей!!</p>
    <h4 id="task2">Задачи:</h4>
    <a href="/DB/insert-update-del-task/4">
        Измените юзера с id, равным 5.
    </a>
    <br />
    <a href="/DB/insert-update-del-task/5">
        Всем юзерам с возрастом более 30 установите зарплату 500.
    </a>
    <br />
    <h3>
        Инкремент и декремент данных через QueryBuilder в Laravel
    </h3>
    С помощью методов increment и decrement можно увеличивать значения числовых полей. Давайте посмотрим, как это
    делается.
    <br />
    Увеличим значение поля на единицу:
    <pre>
    DB::table('posts')
		->where('id', 1)
		->increment('likes');
    </pre>
    Уменьшим значение поля на единицу:
    <pre>
    DB::table('posts')
		->where('id', 1)
		->decrement('likes');
    </pre>
    Увеличим значение поля на заданное значение:
    <pre>
    DB::table('posts')
		->where('id', 1)
		->decrement('likes',5);
    </pre>
    <h4 id="task3">Задачи:</h4>
    <a href="/DB/insert-update-del-task/6">
        Увеличьте на 1 возраст юзеру с id, равным 1.
    </a>
    <br />
    <a href="/DB/insert-update-del-task/7">
        Уменьшите на 1 возраст юзеру с id, равным 1.
    </a>
    <br />
    <a href="/DB/insert-update-del-task/8">
        Всем юзерам с возрастом 30 увеличьте зарплату на 100.
    </a>

    <h3>
        Удаление данных через QueryBuilder в Laravel
    </h3>
    Для изменения данных используется метод delete. Давайте удалим запись с указанным id:
    <pre>
    DB::table('posts')
		->where('id', 1)
		->delete();
    </pre>
    Теперь удалим заданную группу записей:
    <pre>
	DB::table('posts')
		->where('id', '>', 5)
		->delete();
    </pre>
    А теперь удалим вообще все записи:
    <pre>
	DB::table('posts')
		->where('id', '>', 5)
		->delete();
    </pre>


</x-layout>
