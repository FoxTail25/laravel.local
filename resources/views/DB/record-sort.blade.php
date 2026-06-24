<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    <h2>
        QueryBuilder в Laravel
    </h2>
    <h3>
        Сортировка данных при выборке через QueryBuilder в Laravel
    </h3>
    Метод orderBy позволяет отсортировать результат запроса по заданному столбцу:
    <pre>
	$posts = DB::table('posts')
		->orderBy('likes')
		->get();

	dump($posts);
    </pre>
    Второй параметр метода задаёт направление сортировки. Он может быть либо 'asc', либо 'desc':
    <pre>
	$posts = DB::table('posts')
		->orderBy('likes', 'desc')
		->get();

	dump($posts);
    </pre>
    <h4 id="recordSort1">
        Задача
    </h4>
    <a href="/DB/record-sort-task/1">
        Получите всех юзеров и отсортируйте их по возрастанию
        возраста.
    </a>
    <br />
    <a href="/DB/record-sort-task/1">Получите всех юзеров и отсортируйте их по убыванию зарплаты.</a>

    <h3>
        Сортировка по дате при выборке через QueryBuilder в Laravel
    </h3>
    Методы latest и oldest позволяют легко отсортировать результаты по дате. По умолчанию выполняется сортировка по
    столбцу created_at.
    <br />
    Давайте отсортируем посты по убыванию даты:
    <pre>
	$posts = DB::table('posts')
		->latest()
		->get();

	dump($posts);
    </pre>
    А теперь отсортируем посты по возрастанию даты:
    <pre>
	$posts = DB::table('posts')
		->oldest()
		->get();

	dump($posts);
    </pre>
    <h4 id="recordSort2">
        Задача
    </h4>
    <a href="/DB/record-sort-task/3">
        Получите всех юзеров и отсортируйте их по убыванию поля created_at.
    </a>
    <br />
    <a href="/DB/record-sort-task/4">
        Получите юзеров с возрастом больше 20 и отсортируйте их по возрастанию поля created_at.
    </a>

    <h3>
        Указание поля сортировки
    </h3>
    Можно передать имя столбца для сортировки по нему. Для примера давайте отсортируем по возрастанию даты, хранящейся в
    поле date:
    <pre>
        $posts = DB::table('posts')
		->oldest('date')
		->get();

        dump($posts);
    </pre>

    <h4 id="recordSort3">
        Задача
    </h4>
    <a href="/DB/record-sort-task/5">
        Получите юзеров с возрастом меньше 20 и отсортируйте их по возрастанию поля updated_at.
    </a>

    <h3>
        Случайная сортировка при выборке через QueryBuilder в Laravel
    </h3>
    Для сортировки результатов запроса в случайном порядке можно использовать метод inRandomOrder. Давайте для примера
    получим все посты и отсортируем их в случайном порядке:
    <pre>
	$posts = DB::table('posts')
		->inRandomOrder()
		->get();

	dump($posts);
    </pre>
    А теперь давайте получим один случайный пост:
    <pre>
	$post = DB::table('posts')
		->inRandomOrder()
		->first();

	dump($post);
    </pre>

    <h4 id="recordSort4">
        Задача
    </h4>
    <a href="/DB/record-sort-task/6">
        Получите всех юзеров, отсортированных в случайном порядке.
    </a>
    <br />
    <a href="/DB/record-sort-task/7">
        Получите одного случайного юзера.
    </a>
    <br />
    <a href="/DB/record-sort-task/8">
        Получите всех юзеров с возрастом от 20 до 30, отсортированных в случайном порядке.
    </a>
    <br />
    <a href="/DB/record-sort-task/9">
        Получите одного случайного юзера с возрастом от 20 до 30.
    </a>
</x-layout>
