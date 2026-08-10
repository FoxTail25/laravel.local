<x-layout>
    <x-slot:title>
        INSERT, UPDATE, DELETE в QueryBuilderв Laravel
    </x-slot:title>

    <h3>
        INSERT, UPDATE, DELETE в QueryBuilderв Laravel
    </h3>
    <h4>
        Вставка данных через QueryBuilder в Laravel
    </h4>
    Для вставки данных используется метод insert. Он принимает параметром массив имен столбцов и значений:
    <pre>
    DB::table('posts')->insert([
		'title' => 'page',
		'slug'  => 'slug',
	]);
    </pre>
    <h4>
        Получение id
    </h4>
    Можно получить id вставленной записи, использовов для вставки метод insertGetId:
    <pre>
	$id = DB::table('posts')->insertGetId([
		'title' => 'page',
		'slug'  => 'slug',
	]);

	echo $id;
    </pre>
    <h4>
        Массовая вставка
    </h4>
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
    <x-page.content.task.head :data="['task1', 'Задачи:']" />
    <x-page.content.task.body href='qb-insert-update-del-task' :tasks="[
        1 => [
            'text' => 'Вставьте нового юзера в таблицу с юзерами.',
        ],
        2 => [
            'text' => 'Вставьте нового юзера в таблицу с юзерами. Выведите на экран id вставленного юзера.',
        ],
        3 => [
            'text' => 'Вставьте трех новых юзеров в таблицу с юзерами.',
        ],
    ]" />
    <br />
    <br />
    {{-- При review нашел ошибку базы данных. В талице users по умолчанию не задано поле city --}}

    <h4>Обновление данных через QueryBuilderв Laravel</h4>
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
    <x-page.content.task.head :data="['task2', 'Задачи:']" />
    <x-page.content.task.body href='qb-insert-update-del-task' :tasks="[
        4 => [
            'text' => 'Измените юзера с id, равным 5.',
        ],
        5 => [
            'text' => 'Всем юзерам с возрастом более 30 установите зарплату 500.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Инкремент и декремент данных через QueryBuilder в Laravel
    </h4>
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
    <x-page.content.task.head :data="['task3', 'Задачи:']" />
    <x-page.content.task.body href='qb-insert-update-del-task' :tasks="[
        6 => [
            'text' => 'Увеличьте на 1 возраст юзеру с id, равным 1.',
        ],
        7 => [
            'text' => 'Уменьшите на 1 возраст юзеру с id, равным 1.',
        ],
        8 => [
            'text' => 'Всем юзерам с возрастом 30 увеличьте зарплату на 100.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Удаление данных через QueryBuilder в Laravel
    </h4>
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
		->delete();
    </pre>
    <x-page.content.task.head :data="['task4', 'Задачи:']" />
    <x-page.content.task.body href='qb-insert-update-del-task' :tasks="[
        9 => [
            'text' => 'Удалите юзера с максимальным id',
        ],
        10 => [
            'text' => 'Удалите юзеров с возрастом 30.',
        ],
        11 => [
            'text' => 'Удалите всех юзеров',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Соединение таблиц в Laravel
    </h4>
    С помощью метода leftJoin можно выполнять соединение таблиц. Давайте посмотрим на примерах. Пусть у нас кроме
    таблицы с постами есть еще и таблица с категориями, которым принадлежат посты.
    <br />
    Давайте напишем запрос, который получит посты вместе с их категориями:
    <pre>
    $posts = DB::table('posts')
		->leftJoin('categories', 'category.id', '=', 'posts.category_id')
	->get();

	dump($posts);
    </pre>
    <x-page.content.task.head :data="['task5', 'Задача:']" />
    <x-page.content.task.body href='qb-insert-update-del-task' :tasks="[
        12 => [
            'text' =>
                'Сделайте таблицу users и таблицу cities с городами, в которых живут юзеры. С помощью построителя запросов получите список всех юзеров вместе с их городами.',
        ],
    ]" />
    <br />
    <br />


</x-layout>
