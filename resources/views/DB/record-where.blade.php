<x-layout>
    <x-slot:title>
        where в Laravel
    </x-slot:title>

    <h2>
        Выборка (where) в DB в Laravel
    </h2>
    <h3>
        Условия where при выборке через DB в Laravel
    </h3>
    При получении данных можно задавать условие на выборку. Это делается при помощи метода where. Давайте для примера с
    помощью этого метода получим все посты, количество лайков у которых равно 100:
    <pre>
        $posts = DB::table('posts')->where('likes', 100)->get();
    </pre>
    А теперь получим посты, у которых количество лайков больше 100:
    <pre>
        $posts = DB::table('posts')->where('likes', '>', 100)->
		get();
    </pre>
    А теперь получим посты, у которых количество лайков не равно 100:
    <pre>
        $posts = DB::table('posts')->where('likes', '!=', 100)->
		get();
    </pre>

    <h4 id="redordWhereTask1">
        Задача
    </h4>
    <a href="/DB/record-where-task/1">
        Получите всех юзеров с возрастом, равным 30 лет.
    </a>
    <br/>
    <a href="/DB/record-where-task/2">
        Получите всех юзеров с возрастом, не равным 30 лет.
    </a>
    <br/>
    <a href="/DB/record-where-task/3">
        Получите всех юзеров с возрастом, больше 30 лет.
    </a>
    <br/>
    <a href="/DB/record-where-task/4">
        Получите всех юзеров с возрастом, меньше 30 лет.
    </a>
    <br/>
    <a href="/DB/record-where-task/5">
        Получите всех юзеров с возрастом, меньшим или равным 30 лет.
    </a>

    <h3>
        Несколько условий where при выборке через DB в Laravel
    </h3>
    В запросе можно написать несколько условий where. В этом случае они объединятся через логическое И. Давайте
    посмотрим на примере. Напишем следующий запрос:
    <pre>
        $posts = DB::table('posts')
            ->where('likes', '>', 10)
            ->where('likes', '<', 20)
            ->get();
    </pre>
    В результате к базе выполнится следующий запрос:
    <pre>
        SELECT * FROM posts WHERE likes > 10 AND likes < 20
    </pre>
    <h4 id="redordWhereTask2">
        Задача
    </h4>
    <a href="/DB/record-where-task/6">
        Получите всех юзеров с возрастом от 20 до 30 лет.
    </a>
    <h3>
        Условия orWhere при выборке через DB в Laravel
    </h3>
    С помощью метода orWhere можно объединять условия через логическое ИЛИ. Давайте посмотрим на примере:
    <pre>
 	$posts = DB::table('posts')
		->where('id', '=', 10)
		->orWhere('likes', '>', 10)
		->get();
    </pre>
    В результате к базе выполнится следующий запрос:
    <pre>
        SELECT * FROM posts WHERE id = 10 OR likes > 10
    </pre>
    <h4 id="redordWhereTask3">
        Задача
    </h4>
    <a href="/DB/record-where-task/7">
        Получите всех юзеров с возрастом 30 или id, большем 4.
    </a>
    <br />
    <a href="/DB/record-where-task/8">
        Получите всех юзеров с возрастом 30, или зарплатой 500, или id, большем 9
    </a>
    <h3>
        Сложные условия при выборке через DB в Laravel
    </h3>
    При выборке можно конструировать условия любой сложности. Для этого в метод orWhere нужно параметром передать
    анонимную функцию, в которой будут писаться сгрупированные команды:
    <pre>
	$posts = DB::table('posts')
		->where('id', '=', 3)
		->orWhere(function($query) {
			// тут пишем сгрупированные команды
		})
	->get();
    </pre>
    Внутри функции будет доступен объект $query, к которому можно применять методы построителя запроса.
    <pre>
	$posts = DB::table('posts')
		->where('id', '=', 3)
		->orWhere(function($query) {
			$query
				->where('likes', '>', 10)
				->where('likes', '<', 50);
		})
	->get();
    </pre>
    В результате к базе выполнится следующий запрос:
    <pre>SELECT * FROM posts WHERE id = 3 OR (likes > 10 AND likes > 50)</pre>
    <h4 id="redordWhereTask4">
        Задача
    </h4>
    <a href="/DB/record-where-task/9">
        Получите юзеров, у которых зарплата равна 500 либо возраст от 20 до 30.
    </a>

    <h3>Условие whereBetween при выборке через DB в Laravel</h3>
    Метод whereBetween проверяет, что значения столбца находится в указанном интервале:
    <pre>
    $posts = DB::table('posts')
        ->whereBetween('likes', [1, 100])
        ->get();

    dump($posts);
    </pre>
    Метод whereNotBetween проверяет, что значения столбца находится вне указанного интервала:
    <pre>
    $posts = DB::table('posts')
        ->whereNotBetween('likes', [1, 100])
        ->get();

    dump($posts);
    </pre>
    <h4 id="redordWhereTask6">
        Задача
    </h4>
    <a href="/DB/record-where-task/10">
        Получите юзеров, возраст которых находится НЕ в промежутке от 20 до 30.
    </a>
    <h3>
        Условие whereIn при выборке через DB в Laravel
    </h3>
    Метод whereIn проверяет, что значения столбца содержатся в указанном массиве:
    <pre>
    $posts = DB::table('posts')
        ->whereIn('id', [1, 2, 3])
        ->get();

    dump($posts);
    </pre>
    Метод whereNotIn проверяет, что значения столбца не содержатся в указанном массиве:
    <pre>
    $posts = DB::table('posts')
        ->whereNotIn('id', [1, 2, 3])
        ->get();

    dump($posts);
    </pre>
    <h4 id="redordWhereTask7">
        Задача:
    </h4>
    <a href="/DB/record-where-task/11">
        Получите юзеров с id, равными 1, 2, 3 и 5.
    </a>

    <h3>
        Динамические условия при выборке DB в Laravel
    </h3>
    Можно использовать динамические условия, в которых после слова where будет написано имя поля таблицы. Для примера
    давайте сделаем условие по полю id:
    <pre>
	$post = DB::table('posts')
		->whereId(1)
		->get();

	dump($post);
    </pre>
    А теперь сделаем условие по полю slug:
    <pre>
	$post = DB::table('posts')
		->whereSlug('my-page')
		->get();

	dump($post);
    </pre>
    <h4 id="redordWhereTask8">
        Задача:
    </h4>
    <a href="/DB/record-where-task/12">
        Получите юзера с полем id, равным 3.
    </a>
    <a href="/DB/record-where-task/13">
        Получите юзера с полем name, равным 'userName5'.
    </a>
    <h3>
        Комбинации динамических условий DB в Laravel
    </h3>
    Можно комбинировать условия в одном методе:
    <pre>
	$post = DB::table('posts')
		->whereIdAndSlug(1, 'my-page')
		->first();

	dump($post);
    </pre>
    Можно также объединять условия через логическое ИЛИ:
    <pre>
	$post = DB::table('posts')
		->whereIdOrSlug(1, 'my-page')
		->first();

	dump($post);
    </pre>
    <h4 id="redordWhereTask9">
        Задача
    </h4>
    <a href="/DB/record-where-task/14">
        Получите юзера с полем id, равным 3, ИЛИ полем age, равным 20.
    </a>
</x-layout>
