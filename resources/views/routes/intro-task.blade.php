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
    @elseif ($id == 11)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/user/{id}', function ($id) {
    return "В order было записано значение: $order";
})->whereNumber('id');</pre>
        В таком виде, наш роут будет обрабатывать маршруты только если id будет записано числом.
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task7">Назад к задачам</a>
    @elseif ($id == 12)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут.
        <pre>Route::get('/city/{name}', function ($order) {
    return "В order было записано значение: $order";
})->whereAlpha('name');</pre>
        В таком виде, наш роут будет обрабатывать маршруты только если name будет записано буквами.
        <br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task7">Назад к задачам</a>
    @elseif ($id == 13)
        <x-page.tasks.header :text="$text" />
        Что бы выполнить эту задачу, нам необходимо сначала отредаткировать файл
        <b>App/Providers/RouteServiceProvider.php</b> что бы добавить в него глобальное ограничение на часть маршрута
        routeslug:
        <pre>&lt;?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Route;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }
    public function boot(): void
    {
        Route::pattern('testslug', '[a-z0-9_-]+');
    }
}</pre>

        Затем отредаткировать файл <b>routes/web.php</b> что бы добавить в него
        нужный маршрут для теста.

        <pre>Route::get('/test_slug/{testslug}', function ($testslug) {
    return "Вы перешли по маршруту: /test_slug/$testslug";
});</pre>
        В таком виде, наш роут будет обрабатывать маршруты только если testslug будет содержать толь маленькие латинские
        буквы и цифры, а также дефис и подчеркивание.
        <br />
        Это сработает: <a href="/test_slug/4_2">маршрут /test_slug/42</a><br />
        И это сработает: <a href="/test_slug/42-abc">маршрут /test_slug/42-abc</a><br />
        А это нет: <a href="/test_slug/42-ABC">маршрут /test_slug/42-ABC</a> (потому что мы не разрешили использовать в
        маршруте большие латински будквы)<br />
        <br />
        <a href="{{ route('routes-intro') }}#routes_task8">Назад к задачам</a>
    @elseif ($id == 14)
        <h5>Задача:</h5>
        Разрулите конфликт маршрутов:
        <pre>	Route::get('/user/{id}', function ($id) {
		return 'id';
	});
	Route::get('/user/all', function () {
		return 'all';
	});</pre>
        <h5>Решение:</h5>
        Что бы эти маршруты отробатывали правильно, нужно поменять их местами.
        <pre>	Route::get('/user/all', function () {
		return 'all';
	});
    Route::get('/user/{id}', function ($id) {
		return 'id';
	});</pre>

        <a href="{{ route('routes-intro') }}#routes_task9">Назад к задачам</a>
    @elseif ($id == 15)
        <h5>Задача:</h5>
        Разрулите конфликт маршрутов:
        <pre>	Route::get('/user/{id?}', function ($id = null) {
		return 'id';
	});
	Route::get('/user/', function () {
		return 'user';
	});
	Route::get('/user/all', function () {
		return 'all';
	});</pre>
        <h5>Решение:</h5>
        Что бы эти маршруты отробатывали правильно, нужно поменять их местами.
        <pre>	Route::get('/user/', function () {
		return 'user';
	});
	Route::get('/user/all', function () {
		return 'all';
	});
	Route::get('/user/{id?}', function ($id = null) {
		return 'id';
	});</pre>

        <a href="{{ route('routes-intro') }}#routes_task9">Назад к задачам</a>
    @elseif ($id == 16)
        <h5>Задача:</h5>
        Разрулите конфликт маршрутов:
        <pre>	Route::get('/user/{name}/{id?}', function ($name, $id) {
		return 'name id';
	});
	Route::get('/user/all', function () {
		return 'all';
	});
	Route::get('/user/all/desc', function () {
		return 'all desc';
	});</pre>
        <h5>Решение:</h5>
        Что бы эти маршруты отробатывали правильно, нужно поменять их местами.
        <pre>	Route::get('/user/all', function () {
		return 'all';
	});
	Route::get('/user/all/desc', function () {
		return 'all desc';
	});
	Route::get('/user/{name}/{id?}', function ($name, $id) {
		return 'name id';
	});</pre>

        <a href="{{ route('routes-intro') }}#routes_task9">Назад к задачам</a>
    @elseif ($id == 17)
        <h5>Задача:</h5>
        Разрулите конфликт маршрутов:
        <pre>	Route::get('/user/{id}', function ($id) {
		return 'id';
	})->where('id', '[a-z0-9_-]+');
	Route::get('/user/{id}', function ($id) {
		return 'id';
	})->where('id', '[0-9]+');</pre>
        <h5>Решение:</h5>
        Что бы эти маршруты отробатывали правильно, нужно поменять их местами.
        <pre>	Route::get('/user/{id}', function ($id) {
		return 'id';
	})->where('id', '[0-9]+');
	Route::get('/user/{id}', function ($id) {
		return 'id';
	})->where('id', '[a-z0-9_-]+');</pre>

        <a href="{{ route('routes-intro') }}#routes_task9">Назад к задачам</a>
    @elseif ($id == 18)
        <h5>Задача:</h5>
        Сгрупируйте следующие маршруты:
        <pre>	Route::get('/admin/users', function () {
		return 'all';
	});
	Route::get('/admin/user/{id}', function ($id) {
		return $id;
	});</pre>
        <h5>Решение:</h5>
        У обоих маршрутов общий префикс admin вынесем его в группу:
        <pre>	Route::prefix('admin')->group(function () {
		Route::get('/users', function () {
			return 'all';
		});
		Route::get('/user/{id}', function ($id) {
			return $id;
		});
	});</pre>

        <a href="{{ route('routes-intro') }}#routes_task10">Назад к задачам</a>
    @endif


</x-layout>
