<x-layout>
    <x-slot:title>
        Маршруты в Laravel
    </x-slot:title>
    <h2>
        Задачи на Routes (маршруты) в Laravel
    </h2>
    <hr />
    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/test', function () {
		return 'вы перешли по адресу: /test';
	    });</pre>
        <h5>
            Результат:
        </h5>
        <a href="/test">маршрут test</a>
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task1">Назад к задачам</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/dir/test', function () {
		return 'вы перешли по адресу: /dir/test';
	    });</pre>
        <h5>
            Результат:
        </h5>
        <a href="/dir/test">маршрут test</a>
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task1">Назад к задачам</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/user/{name}', function ($name) {
		return 'вы перешли по адресу: /user/'.$name;
	    });</pre>
        <h5>
            Результат:
        </h5>
        <a href="/user/user1">маршрут user1</a><br />
        <a href="/user/user2">маршрут user2</a><br />
        <a href="/user/user3">маршрут user3</a><br />
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task2">Назад к задачам</a>
    @elseif ($id == 4)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/{surname}/{name}', function ($surname, $name) {
		return "вы перешли по адресу: $surname $name";
	    });</pre>
        <h5>
            Результат:
        </h5>
        <a href="/user/surname1/user1">маршрут user1</a><br />
        <a href="/user/surname2/user2">маршрут user2</a><br />
        <a href="/user/surname3/user3">маршрут user3</a><br />
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task3">Назад к задачам</a>
    @elseif ($id == 5)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/city/{city?}', function ($city = 'Minsk') {
		return "Город: $city";
	    });</pre>
        <h5>
            Результат:
        </h5>
        <a href="/city/">маршрут /city/</a><br />
        <a href="/city/Moskow">маршрут /city/Moskow</a><br />
        <a href="/city/Yaroslavl">маршрут /city/Yaroslavl</a><br />
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task4">Назад к задачам</a>
    @elseif ($id == 6)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/usernum/{id}', function ($id) {
    return "id = $id";
})->where('id', '[0-9]+');</pre>
        В таком виде, наш роут будет обрабатывать моаршруты только если id является числом
        <h5>
            Результат:
        </h5>
        Обращаемся к маршруту где id = 1<a href="/usernum/1">маршрут /usernum/1</a><br />
        Обращаемся к маршруту где id = 11<a href="/usernum/11">маршрут /usernum/11</a><br />
        Обращаемся к маршруту где id = aa<a href="/usernum/aa">маршрут /usernum/aa</a><br />
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task5">Назад к задачам</a>
    @elseif ($id == 7)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/userwhere/{id}/{name}', function ($id, $name) {
    return "id = $id name = $name";
})->where('id', '[0-9]+')->where('name', '[a-z]{2,}');</pre>
        В таком виде, наш роут будет обрабатывать маршруты только если id является числом, а name латинскими буквами не
        менее 2
        <h5>
            Результат:
        </h5>
        <a href="/userwhere/5/cat">маршрут /userwhere/5/cat</a><br />
        <a href="/userwhere/12/f">маршрут /userwhere/12/f</a><br />
        <a href="/userwhere/7/007">маршрут /userwhere/7/007</a><br />
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task6">Назад к задачам</a>
    @elseif ($id == 8)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/posts/{date}', function ($date) {
    return "дата: $date";
})->where('date', '\d{2}-\d{2}-\d{4}');</pre>
        В таком виде, наш роут будет обрабатывать маршруты только если date будет записано в формате
        2числа-2числа-4числа.
        <h5>
            Результат:
        </h5>
        <a href="/posts/17-10-2024">маршрут /posts/17-10-2024</a><br />
        <br />
        <br />

        <a href="{{ route('routes-intro') }}#routes_task6">Назад к задачам</a>
    @elseif ($id == 9)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return "дата: $year-$month-$day";
})->where('year', '\d{4}')->where('month', '\d{2}')->where('day', '\d{2}');</pre>
        В таком виде, наш роут будет обрабатывать маршруты только если year будет записано 4 цифры, month - 2цифры, day
        - 2 цифры.
        <h5>
            Результат:
        </h5>
        <a href="/2021/08/02">маршрут /2021/08/02</a><br />
        <br />
        <br />

        <a href="{{ route('routes-intro') }}#routes_task6">Назад к задачам</a>
    @elseif ($id == 10)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/users/{order}', function ($order) {
    return "В order было записано значение: $order";
})->where('order', '\b(name|surname|age)\b');</pre>
        В таком виде, наш роут будет обрабатывать маршруты только если order будет записано name, surname или age.
        - 2 цифры.
        <h5>
            Результат:
        </h5>
        <a href="/users/name">маршрут /users/name</a><br />
        <a href="/users/surname">маршрут /users/surname</a><br />
        <a href="/users/age">маршрут /users/age</a><br />
        <a href="/users/42">маршрут /users/42</a><br />

        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task6">Назад к задачам</a>
    @endif


</x-layout>
