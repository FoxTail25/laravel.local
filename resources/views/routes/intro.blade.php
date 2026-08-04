<x-layout>
    <x-slot:title>
        Маршруты в Laravel
    </x-slot:title>
    <h2>
        Routes (маршруты) в Laravel
    </h2>
    <h3>
        Введение
    </h3>
    Маршруты (или роуты) указывают фреймворку, что показывать при обращении к определенному URI в браузере.
    <br />
    Маршруты настраиваются в файле <b>routes/web.php</b>. Изначально там уже есть вот такой маршрут:
    <pre>&lt;?php
	Route::get('/', function () {
		return view('welcome');
	});</pre>
    Как вы видите, маршрут представляет собой статический метод get класса Route.
    <br />
    Первым параметром этот метод принимает URI, а вторым параметром - анонимную функцию, которая выполнится при
    обращению пользователя к данному URI в адресной строке браузера.
    <br />
    To, что вернет эта анонимная функция через return и покажется в окне браузера. Сейчас наша функция возвращает
    результат работы функции view. Пока не будем разбираться, что делает эта функция, а поправим наш маршрут на
    следующее:
    <br />
    <pre>&lt;?php
	Route::get('/', function () {
		return '!!!';
	});</pre>
    Как вы видите, теперь при обращении к URI / (то есть к главной странице сайта), на экран выведется строка '!!!'.
    <br />
    В файле web.php можно писать любое количество маршрутов, указывая соответствующие адреса, например, так:
    <pre>&lt;?php
	Route::get('/', function () {
		return 'главная страница сайта';
	});

	Route::get('/posts', function () {
		return 'список постов';
	});

	Route::get('/post/1', function () {
		return 'первый пост';
	});</pre>
    <x-page.content.task.head :data="['routes_task1', 'Задачи:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        1 => [
            'text' => 'Сделайте так, чтобы при обращении на адрес /test в браузер выводилось какое-нибудь сообщение.',
        ],
        2 => [
            'text' =>
                'Сделайте так, чтобы при обращении на адрес /dir/test в браузер выводилось какое-нибудь сообщение.',
        ],
    ]" />
    <br />
    <br />
    <h3>
        Параметры маршрутов в Laravel
    </h3>
    Можно сделать так, чтобы Laravel сам разбивал URI так, чтобы его отдельные части попадали в заданные переменные. Для
    этого предназначены параметры маршрутов.
    <br />
    Давайте посмотрим на примере. Пусть у нас есть адреса вида /post/1, где вместо единицы может быть любое число.
    <br />
    Давайте напишем соответствующий маршрут, объявив вторую его часть параметром. Для этого придумаем имя параметра и
    возьмем его в фигурные скобки, вот так:
    <pre>&lt;?php
	Route::get('/post/{id}', function () {
		return '';
	});</pre>
    После этого в параметр функции мы можем написать переменную, в которую будет попадать значение нашего параметра:
    <pre>&lt;?php
	Route::get('/post/{id}', function ($id) {
		return 'пост ' . $id;
	});</pre>
    <x-page.content.task.head :data="['routes_task2', 'Задача:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        3 => [
            'text' =>
                'Сделайте маршрут, обрабатывающий адреса вида /user/:name, где вместо :name может быть любая строка.',
        ],
    ]" />
    <br />
    <br />
    <h3>
        Несколько параметров маршрутов в Laravel
    </h3>
    В маршрутах можно указывать несколько параметров. Смотрите пример:
    <pre>&lt;?php
	Route::get('/post/{catId}/{postId}', function ($catId, $postId) {
		return $catId . ' ' . $postId;
	});</pre>
    <div class="text-danger">
        <h5 class="m-0">
            !Замечание!
        </h5>
        В функцию-обработчик параметры попадают в порядке следования. Это значит, что имена параметров и переменных не
        обязательно должны совпадать. Но лучше, конечно же, задавать одинаковые имена параметров и соответствующих
        переменных, чтобы не было путаницы.
    </div>
    <x-page.content.task.head :data="['routes_task3', 'Задача:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        4 => [
            'text' =>
                'Сделайте маршрут, обрабатывающий адреса вида /user/:surname/:name/, где параметры задают имя и фамилию юзера.',
        ],
    ]" />
    <br />
    <br />
    <h3>
        Необязательные параметры маршрутов в Laravel
    </h3>
    Параметры маршрутов можно объявлять не обязательными. Давайте посмотрим на примере. Пусть у нас есть следующий
    маршрут:
    <pre>&lt;?php
	Route::get('/posts/page/{page}', function ($page) {
		return 'страница номер ' . $page;
	});</pre>
    Сделаем так, чтобы номер страницы был необязательным параметром. Для этого после его имени поставим знак вопроса:
    <pre>&lt;?php
	Route::get('/posts/page/{page?}', function ($page) {
		return 'страница номер ' . $page;
	});</pre>
    Необязательный параметр должен иметь значение по умолчанию, иначе Laravel выдаст ошибку при попытке обратиться без
    параметра. Исправим проблему, указав соответствующей переменной значение по умолчанию:
    <pre>&lt;?php
	Route::get('/posts/page/{page?}', function ($page = 1) {
		return 'страница номер ' . $page;
	});</pre>
    <x-page.content.task.head :data="['routes_task4', 'Задача:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        5 => [
            'text' =>
                'Пусть дан адрес вида /city/:city, где в параметре будет задаваться город. Сделайте так, чтобы город был необязательным параметром и по умолчанию имел значение minsk.',
        ],
    ]" />
    <br />
    <br />
    <h3>
        Ограничения параметров маршрутов в Laravel
    </h3>
    Как правило мы бы хотели наложить на параметры маршрутов некоторые ограничения. Давайте посмотрим на примере. Пусть
    у нас есть следующий маршрут:
    <pre>&lt;?php
	Route::get('/post/{id}', function ($id) {
		return 'пост ' . $id;
	});</pre>
    Очевидно, что id должен быть числом. Однако, сейчас наш маршрут не следит за этим и поймает любой адрес такого вида,
    например, /post/eee.
    <br />
    Давайте наложим ограничение на наш параметр. Это делается с помощью метода where и регулярных выражений:
    <pre>&lt;?php
	Route::get('/post/{id}', function ($id) {
		return 'пост ' . $id;
	})->where('id', '[0-9]+');</pre>
    <x-page.content.task.head :data="['routes_task5', 'Задача:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        6 => [
            'text' =>
                'Сделайте маршрут вида /usernum/:id, где вместо :id должно быть число. Попробуйте обратиться через браузер к этому маршруту, передав параметром число. Попробуйте обратиться через браузер к этому маршруту, передав параметром не число. Расскажите, что будет.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Ограничения на несколько параметров маршрутов в Laravel
    </h3>
    Ограничения можно накладывать на несколько параметров. Для этого нужно вызвать несколько методов where в виде
    цепочки.
    <br />
    Посмотрим на примере. Пусть у нас дан следующий маршрут с несколькими параметрами:
    <pre>&lt;?php
	Route::get('/post/{slug}/{id}', function ($slug, $id) {
		return 'пост ' . $slug . ' ' . $id;
	});</pre>
    Зададим этим параметрам соответствующие ограничения:
    <pre>&lt;?php
	Route::get('/post/{slug}/{id}', function ($slug, $id) {
		return 'пост ' . $slug . ' ' . $id;
	})->where('slug', '[a-z0-9_-]+')->where('id', '[0-9]+');</pre>
    <x-page.content.task.head :data="['routes_task6', 'Задачи:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        7 => [
            'text' =>
                'Сделайте маршрут вида /userwhere/:id/:name, где вместо :id должно быть число, а вместо :name - строка, состоящая из маленьких латинских букв количеством более 2-х.',
        ],
        8 => [
            'text' => 'Сделайте маршрут вида /posts/:date, где вместо :date должна быть дата в формате год-месяц-день.',
        ],
        9 => [
            'text' =>
                'Сделайте маршрут вида /:year/:month/:day, где вместо :year должен быть год, вместо :month - месяц, вместо :day - день.',
        ],
        10 => [
            'text' =>
                'Сделайте маршрут вида /users/:order, где вместо :order должно быть одно из значений: name, surname или age.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Шаблонные ограничения параметров маршрутов в Laravel
    </h3>
    Не очень удобно каждый раз для ограничения параметров прописывать одни и те же регулярки. Поэтому для популярных
    ограничений в Laravel созданы специальные методы. Давайте их рассмотрим.
    <br />
    Следующий метод ограничивает параметр только цифрами:
    <pre>&lt;?php
	Route::get('/post/{id}', function ($id) {
		//
	})->whereNumber('id');</pre>
    Следующий метод ограничивает параметр только буквами:
    <pre>&lt;?php
	Route::get('/post/{slug}', function ($slug) {
		//
	})->whereAlpha('slug');</pre>
    Следующий метод ограничивает параметр цифрами и буквами:
    <pre>&lt;?php
	Route::get('/post/{slug}', function ($slug) {
		//
	})->whereAlphaNumeric('slug');</pre>
    Следующий метод ограничивает параметр списком значений:
    <pre>&lt;?php
	Route::get('/post/{category}', function ($slug) {
		//
	})->whereIn('category', ['news', 'blog']);</pre>
    <x-page.content.task.head :data="['routes_task7', 'Задачи:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        11 => [
            'text' => 'Сделайте маршрут вида /user/:id, где вместо :id должно быть число.',
        ],
        12 => [
            'text' => 'Сделайте маршрут вида /city/:name, где вместо :name должны быть буквы.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Глобальные ограничения параметров в Laravel
    </h3>
    Можно сделать так, чтобы параметр с определенным именем всегда имел заданное ограничение в любых маршрутах. Это
    нужно прописовать в методе boot класса RouteServiceProvider. (path: App/Providers/RouteServiceProvider.php)
    <br />
    Давайте для примера зададим глобальное ограничение для параметра с именем id:
    <pre>&lt;?php
	public function boot()
	{
	    Route::pattern('id', '[0-9]+');
	}</pre>
    Теперь любой маршрут, у которого есть параметр id, выполнится только если id будет числом:
    <pre>&lt;?php
	Route::get('/post/{id}', function ($id) {
		return '!!!'; // только если число
	});</pre>
    <x-page.content.task.head :data="['routes_task8', 'Задача:']" />
    <x-page.content.task.body href='routes-task' :tasks="[
        13 => [
            'text' =>
                'Наложите глобальное ограничение на параметр routslug. Пусть он может содержать буквы и цифры, а также дефис и подчеркивание.',
        ],
    ]" />
    <br />
    <br />

    <h3>
        Разрешение конфликтов маршрутов в Laravel
    </h3>
    Laravel проверяет маршруты по порядку их записи. Если найден подходящий маршрут, то дальнейшая проверка
    прекращается.
    <br />
    Из-за этого маршруты могут конфликтовать друг с другом. Например, в следующем примере второй маршут никогда не будет
    достигнут, так обращение к нему будет перехвачено первым маршрутом:
    <pre>&lt;?php
	Route::get('/post/{id}', function ($id) {
		return 'id';
	});
	Route::get('/post/all', function () {
		return 'all';
	});</pre>
    Для избежания конфликтов следует писать более частные случаи маршрутов вначале, а потом - более общие. Поменяем
    порядок следования наших маршрутов и проблема исчезнет:
    <pre>&lt;?php
	Route::get('/post/all', function () {
		return 'all';
	});
	Route::get('/post/{id}', function ($id) {
		return 'id';
	});</pre>
    Можно также наложить ограничение на параметры. В этом случае причина конфликта исчезнет. Давайте укажем, что наши id
    должны быть числами. В этом случае второй маршрут уже не будет частным случаем первого и все будет работать верно:
    <pre>&lt;?php
	Route::get('/post/{id}', function ($id) {
		return 'id';
	})->where('id', '[0-9]+');
	Route::get('/post/all', function () {
		return 'all';
	});</pre>
    <x-page.content.task.head :data="['routes_task9', 'Задачи:']" />
    <ol>
        <li>
            <a href="{{ route('routes-task', ['id' => 14]) }}" style="text-decoration: none;">Разрулите конфликт
                маршрутов:
                <pre>	Route::get('/user/{id}', function ($id) {
		return 'id';
	});
	Route::get('/user/all', function () {
		return 'all';
	});</pre>
            </a>
        </li>
        <li>
            <a href="{{ route('routes-task', ['id' => 15]) }}" style="text-decoration: none;">Разрулите конфликт
                маршрутов:
                <pre>	Route::get('/user/{id?}', function ($id = null) {
		return 'id';
	});
	Route::get('/user/', function () {
		return 'user';
	});
	Route::get('/user/all', function () {
		return 'all';
	});</pre>
            </a>
        </li>
        <li>
            <a href="{{ route('routes-task', ['id' => 16]) }}" style="text-decoration: none;">Разрулите конфликт
                маршрутов:
                <pre>	Route::get('/user/{name}/{id?}', function ($name, $id) {
		return 'name id';
	});
	Route::get('/user/all', function () {
		return 'all';
	});
	Route::get('/user/all/desc', function () {
		return 'all desc';
	});</pre>
            </a>
        </li>
        <li>
            <a href="{{ route('routes-task', ['id' => 17]) }}" style="text-decoration: none;">Разрулите конфликт
                маршрутов:
                <pre>	Route::get('/user/{id}', function ($id) {
		return 'id';
	})->where('id', '[a-z0-9_-]+');
	Route::get('/user/{id}', function ($id) {
		return 'id';
	})->where('id', '[0-9]+');</pre>
            </a>
        </li>
    </ol>
    <br />
    <br />

    <h3>
        Группировка маршрутов в Laravel
    </h3>
    Можно группировать маршруты, адреса которых начинаются на одинаковую часть. Давайте посмотрим на примере. Пусть у
    нас есть такие адреса:
    <pre>&lt;?php
	Route::get('/blog/post/all', function () {
		return 'all';
	});
	Route::get('/blog/post/{id}', function ($id) {
		return $id;
	});</pre>
    Вынесем общую часть:
    <pre>&lt;?php
	Route::prefix('blog')->group(function () {
		Route::get('/post/all', function () {
			return 'all';
		});
		Route::get('/post/{id}', function ($id) {
			return $id;
		});
	});</pre>
    <x-page.content.task.head :data="['routes_task10', 'Задача:']" />
    <ol>
        <li>
            <a href="{{ route('routes-task', ['id' => 18]) }}" style="text-decoration: none;">Сгрупируйте следующие
                маршруты:
                <pre>	Route::get('/admin/users', function () {
		return 'all';
	});
	Route::get('/admin/user/{id}', function ($id) {
		return $id;
	});</pre>
            </a>
        </li>
    </ol>
    <br />
    <br />

    <h3>
        Именованные маршруты в Laravel
    </h3>
    Маршрутам можно давать имена. Эти имена в дальнейшем могут быть использованы для различных целей. Давайте посмотрим
    на примере. Пусть дан такой маршрут:
    <pre>	Route::get('/post/all', function () {
		return 'all';
	});</pre>
    Давайте дадим ему имя:
    <pre>	Route::get('/post/all', function () {
		return 'all';
	})->name('posts');</pre>
    <br />
    <br />
    <i>
        <b>
            Изначально, я не оценил важности этой темы. И вообще не понял зачем это нужно. А потом кааак
            пооонял....))))
        </b>
        <br />
        p.s. Понимание пришло ко мне только после серьёзного знакомства с темами Controller и Blade (components).
    </i>
    <br />
    <br />
    Сейчас попробую объяснить суть этого "именования маршрута". По сути, name('posts') - сообщает laravel
    "короткое/(внутреннее)" имя маршрута. Которое видит только сам Laravel. Возьмём последний пример кода. Там указывает
    маршрут, который будет обрабатывать роутер (/post/all) и по идее, что бы попасть на эту страницу, вы будете
    указывать в ссылке адрес &lt;a> href="/post/all">все посты&lt;/a> И таких ссылок в ваше проекте может быть очень
    много. Но вот вы (или заказчик) решил что теперь "все посты" должны находиться по ссылке (/post/all-posts). В
    результате, вам необходимо исправить ссылку в роуте, и ВСЕ ссылки типа <b>&lt;a> href="/post/all">все
        посты&lt;/a></b> вам
    нужно будет найти и заменить на <b>&lt;a> href="/post/all-posts">все посты&lt;/a></b>...
    Представили сколько работы вам предстоит?? И если проект не маленький, обязательно можно что-то пропустить((
    <br />
    <i>Вот тут нам и пригодится "именованнай маршрут!")))</i>Вместо<b>&lt;a> href="/post/all">все
        посты&lt;/a></b>в шаблонах blade (будут рассмотрены далее) можно указать <b>&lt;a>
        href="&#123;&#123; route('posts') }}">все
        посты&lt;/a></b> при формировании ответа сервара клиенту, подобные ссылки будет автоматически подменяться
    абсолютным путём указанным в роутере!
    <br />
    <br />
    <h3>
        Передача get-параметров в именованный маршрут
    </h3>
    Для передачи GET-параметров (Query String) в именованный маршрут в Laravel передайте их в виде ассоциативного
    массива вторым аргументом в хелпер route().Все элементы массива, ключи которых не совпадают с обязательными
    параметрами самого пути ({id}, {slug}), Laravel автоматически преобразует в GET-параметры и добавит в конец URL.
    <br />
    Примеры использования:
    <ol>
        <li>
            <b>Маршрут без параметров в пути</b>
            <br />
            Если в самом URL нет динамических переменных, все переданные данные станут GET-параметрами.
            <br />
            Определение маршрута в routes/web.php
            <pre>Route::get('/search', [SearchController::class, 'index'])->name('search');</pre>
            // Генерация ссылки в контроллере или blade
            <pre>$url = route('search', ['query' => 'laravel', 'page' => 2]);</pre>
            // Результат:
            <pre>/search?query=laravel&page=2</pre>
        </li>
        <li>
            <b>Маршрут с параметрами пути и GET-параметрами</b>
            <br />
            Если в маршруте есть обязательный параметр (например, {category}), то первый элемент массива заполнит
            его, а остальные уйдут в Query String
            <br />
            Определение маршрута в routes/web.php
            <pre>Route::get('/catalog/{category}', [CatalogController::class, 'show'])->name('catalog.show');</pre>

            // Генерация ссылкив в контроллере или blade
            <pre>$url = route('catalog.show', [
            'category' => 'electronics', // Подставится вместо {category}
            'sort' => 'price_desc', // Станет GET-параметром
            'instock' => 'yes' // Станет GET-параметром
            ]);</pre>

            // Результат:
            <pre>/catalog/electronics?sort=price_desc&instock=yes</pre>
        </li>
        <li>
            <b>Перенаправление (Redirect) с GET-параметрами</b>
            <br />
            Для редиректа используется аналогичный синтаксис с хелпером
            to_route() или методом route()
            <pre>return to_route('search', ['query' => 'php', 'filter' => 'active']);
// или через старый синтаксис:
return redirect()->route('search', ['query' => 'php', 'filter' => 'active']);</pre>
            <br />
            <b>Как получить эти параметры в контроллере</b>
            <br />
            В принимающем контроллере вы вытаскиваете GET-параметры через объект Request:phpuse Illuminate\Http\Request;
            <pre>public function index(Request $request)
    {
        $query = $request->query('query'); // 'laravel'
        $page = $request->input('page'); // 2

        // Получить все GET-параметры сразу:
        $allGetParameters = $request->query();
    }</pre>
        </li>
    </ol>

</x-layout>
