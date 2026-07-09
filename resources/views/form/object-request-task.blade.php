<x-layout>
    <x-slot:title>
        Form в Laravel
    </x-slot:title>

    <h2>
        Form в Laravel
    </h2>
    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller {


    public function objectRequest(Request $request, int|string $id){
          $tasks = [
            '1' => [
                'text' => 'Внедрите объект запроса в действие вашего контроллера.',
                'data' => function(){
                    return [];
                },
            ],

        ];
        if (! isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('form.object-request-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
}
        </pre>

        <a href="/form/object-request#task1">назад</a>
    @elseif($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller code:
    'data' => function() use ($request){
    // Проверяем, что форма была отправлена (хотя бы один инпут заполнен)
    if ($request->hasAny(['inp1', 'inp2', 'inp3'])) {
    </pre>
        <div class="text-primary">
            <pre>$request->hasAny(['inp1', 'inp2', 'inp3']) //проверяет что хоть один из этих параметров заполнен</pre>
        </div>
        <pre>
        $inp1 = (int)$request->input('inp1', 0);
        $inp2 = (int)$request->input('inp2', 0);
        $inp3 = (int)$request->input('inp3', 0);
    </pre>
        <div class="text-primary">
            <pre>$request->input('inp1', 0) // если в форме этот инпут не будет заполнен, то вместо него подставится 0</pre>
        </div>
        <pre>
            return $inp1 + $inp2 + $inp3;
        }
        return null; // Форма еще не отправлялась
    },
// Blade code:
&#64;if (is_null($data))
    &lt;form action="&#123;&#123; url()->current() }}">
        &lt;input type="number" name="inp1" required value="0">
        &lt;input type="number" name="inp2" required value="0">
        &lt;input type="number" name="inp3" required value="0">
        &lt;input type="submit">
    &lt;/form>
&#64;else
    &lt;p>Сумма всех введённых чисел = &lt;strong>&#123;&#123; $data }}&lt;/strong>&lt;/p>
    &lt;br />
    &lt;a href="&#123;&#123; url()->current() }}">Ввести числа заново&lt;/a>
&#64;endif
        </pre>
        <div class="text-primary">
            Внутри атрибута href записана конструкция &#123;&#123; url()->current() }} — это специальный инструмент
            Laravel для динамической генерации веб-адресов. Вот детальный разбор того, как это работает:
            <ol>
                <li>
                    Фигурные скобки &#123;&#123; ... }} Это синтаксис шаблонизатора Blade. Он выполняет PHP-код внутри
                    себя, автоматически очищает результат от опасных символов (XSS-атак) и сразу выводит его на экран
                    (работает как echo).
                </li>
                <li>
                    Хелпер url()Это глобальная функция Laravel, которая возвращает объект для работы с URL-адресами
                    приложения. Она автоматически учитывает протокол вашего сайта (http:// или https://) и текущий домен
                    (например, mysite.ru или localhost).
                </li>
                <li>
                    Метод ->current()Этот метод запрашивает у Laravel текущий URL-адрес страницы, на которой сейчас
                    находится пользователь, но без параметров запроса (без того, что идет после знака вопроса ?).
                </li>
            </ol>

        </div>
        @if (is_null($data))
            <form action="{{ url()->current() }}">
                <input type="number" name="inp1" required value="0">
                <input type="number" name="inp2" required value="0">
                <input type="number" name="inp3" required value="0">
                <input type="submit">
            </form>
        @else
            <p>Сумма всех введённых чисел = <strong>{{ $data }}</strong></p>
            <br />
            <a href="{{ url()->current() }}">Ввести числа заново</a>
        @endif
        <br />
        <a href="/form/object-request#task2">назад</a>
    @elseif($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Controller code:
    'data' => function() use ($request){
    // $request->filled('name') — возвращает true, если поле присутствует и не является пустым.
    if ($request->filled(['name', 'age', 'salary'])) {
        $name = (string)$request->input('name');
        $age = (string)$request->input('age');
        $salary = (string)$request->input('salary');

            return "Здравствуйте $name! Ваш возраст: $age, Ваша заплата: $salary";
        }
        return null; // Форма еще не отправлялась
    },

    // Blade code:
    &#64;if (is_null($data))
&lt;form action="&#123;&#123; url()->current() }}" method="POST">
        &lt;div>Введите&lt;/div>
        &#64;csrf // без этого ларавель не примет форму
        &lt;label for="name">
            Имя:&lt;br />
            &lt;input type="text" name="name" required />
        &lt;/label>&lt;br />
        &lt;label for="name">
            Возраст:&lt;br />
            &lt;input type="text" name="age" required />
        &lt;/label>&lt;br />
        &lt;label for="name">
            Зарплату:&lt;br />
            &lt;input type="text" name="salary" required />
        &lt;/label>&lt;br />
        &lt;input type="submit">
    &lt;/form>
&#64;else
&lt;p>&lt;strong>&#123;&#123; $data }}&lt;/strong>&lt;/p>
&lt;br />
&lt;a href="&#123;&#123; url()->current() }}">Ввести данные заново&lt;/a>
&#64;endif
</pre>

        @if (is_null($data))
            <form action="{{ url()->current() }}" method="POST">
                <div>Введите</div>
                @csrf
                <label for="name">
                    Имя:<br />
                    <input type="text" name="name" required />
                </label><br />
                <label for="name">
                    Возраст:<br />
                    <input type="text" name="age" required />
                </label><br />
                <label for="name">
                    Зарплату:<br />
                    <input type="text" name="salary" required />
                </label><br />
                <input type="submit">
            </form>
        @else
            <p><strong>{{ $data }}</strong></p>
            <br />
            <a href="{{ url()->current() }}">Ввести данные заново</a>
        @endif
        <br />
        <a href="/form/object-request#task3">назад</a>
    @elseif($id == 4)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Router code: (web.php)
    Route::match(['get', 'post'],'/object-request-task/{id}', [FormController::class, 'objectRequest'])->whereNumber('id');

    // Controller code:
    'data' => function() use ($request){
    // $request->filled('name') — возвращает true, если поле присутствует и не является пустым.
    if ($request->filled(['country', 'city'])) {
        $country = (string)$request->input('country');
        $city = (string)$request->input('city');

            return ['country'=> $country, 'city'=> $city];
        }
        return null; // Форма еще не отправлялась
    },

    // Blade code:
    &#64;if (!is_null($data))
        &lt;p>
            Страна: &#123;&#123; $data['country'] }} Город: &#123;&#123; $data['city'] }}
        &lt;/p>
        &lt;a href="&#123;&#123; url()->current() }}">Ввести данные заново&lt;/a>
    &#64;endif
    &lt;div>Введите вашу страну и город&lt;/div>
    &lt;form action="&#123;&#123; url()->current() }}" method="POST">
        &#64;csrf
        &lt;label for="country">
            Страна:&lt;br />
            &lt;input type="text" name="country" required />
        &lt;/label>&lt;br />
        &lt;label for="city">
            Город:&lt;br />
            &lt;input type="text" name="city" required />
        &lt;/label>&lt;br />
        &lt;input type="submit">
    &lt;/form>
</pre>

        @if (!is_null($data))
            <p>
                Страна: {{ $data['country'] }} Город: {{ $data['city'] }}
            </p>
            <a href="{{ url()->current() }}">Ввести данные заново</a>
        @endif
        <div>Введите вашу страну и город</div>
        <form action="{{ url()->current() }}" method="POST">
            @csrf
            <label for="country">
                Страна:<br />
                <input type="text" name="country" required />
            </label><br />
            <label for="city">
                Город:<br />
                <input type="text" name="city" required />
            </label><br />
            <input type="submit">
        </form>
        <br />
        <a href="/form/object-request#task4">назад</a>
    @elseif($id == 5)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => function() use ($request){
        if ($request->hasAny(['inp1', 'inp2','inp3'])) {
            // $request->all() возвращает все данные формы в виде массива
            return $request->all();
            }
            return null; // Форма еще не отправлялась
        },

        // Blade code:
        &#64;if (!is_null($data))
            &lt;p>
                Выводим данные в виде ul
            &lt;/p>
            &lt;ul>
                &#64;foreach ($data as $inputName => $inputValue)
                    &lt;li>&#123;&#123; $inputName }} = &#123;&#123; $inputValue }}&lt;/li>
                &#64;endforeach
            &lt;/ul>
            &lt;a href="&#123;&#123; url()->current() }}">Ввести данные заново&lt;/a>
        &#64;endif
        &lt;div>произвольное количество инпутов))&lt;/div>
        &lt;form action="&#123;&#123; url()->current() }}" method="GET">
            &lt;input type="text" name="inp1" required />
            &lt;input type="text" name="inp2" required />
            &lt;input type="text" name="inp3" required />
            &lt;input type="submit">
        &lt;/form></pre>

        @if (!is_null($data))
            <p>
                Выводим данные в виде ul
            </p>
            <ul>
                @foreach ($data as $inputName => $inputValue)
                    <li>{{ $inputName }} = {{ $inputValue }}</li>
                @endforeach
            </ul>
            <a href="{{ url()->current() }}">Ввести данные заново</a>
        @endif
        <div>произвольное количество инпутов))</div>
        <form action="{{ url()->current() }}" method="GET">
            <input type="text" name="inp1" required />
            <input type="text" name="inp2" required />
            <input type="text" name="inp3" required />
            <input type="submit">
        </form>
        <br />
        <a href="/form/object-request#task5">назад</a>
    @elseif($id == 6)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => function() use ($request){
        if ($request->hasAny(['name', 'login'])) {
            return $request->only('name', 'login');
            }
            return null; // Форма еще не отправлялась
        },

        // Blade code:
        &#64;if (!is_null($data))
            &lt;p>
                Выводим данные в виде ul
            &lt;/p>
            &lt;ul>
                &#64;foreach ($data as $inputName => $inputValue)
                    &lt;li>&#123;&#123; $inputName }} = &#123;&#123; $inputValue }}&lt;/li>
                &#64;endforeach
            &lt;/ul>
            &lt;a href="&#123;&#123; url()->current() }}">Ввести данные заново&lt;/a>
        &#64;endif
        &lt;form action="&#123;&#123; url()->current() }}" method="GET">
            &lt;input type="text" name="name" required />
            &lt;input type="text" name="login" required />
            &lt;input type="text" name="email" required />
            &lt;input type="text" name="password" required />
            &lt;input type="submit">
        &lt;/form></pre>

        @if (!is_null($data))
            <p>
                Выводим данные в виде ul
            </p>
            <ul>
                @foreach ($data as $inputName => $inputValue)
                    <li>{{ $inputName }} = {{ $inputValue }}</li>
                @endforeach
            </ul>
            <a href="{{ url()->current() }}">Ввести данные заново</a>
        @endif
        <form action="{{ url()->current() }}" method="GET">
            <label>
                Имя:<br />
                <input type="text" name="name" required />
            </label><br />
            <label>
                Логин:<br />
                <input type="text" name="login" required />
            </label><br />
            <label>
                Емаил:<br />
                <input type="text" name="email" required />
            </label><br />
            <label>
                Пароль:<br />
                <input type="text" name="password" required />
            </label><br />

            <input type="submit">
        </form>
        <br />
        <a href="/form/object-request#task6">назад</a>
    @elseif($id == 7)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => function() use ($request){
        if ($request->hasAny(['name', 'login'])) {
            return $request->except('email', 'password');
            }
            return null; // Форма еще не отправлялась
        },

        // Blade code:
        &#64;if (!is_null($data))
            &lt;p>
                Выводим данные в виде ul
            &lt;/p>
            &lt;ul>
                &#64;foreach ($data as $inputName => $inputValue)
                    &lt;li>&#123;&#123; $inputName }} = &#123;&#123; $inputValue }}&lt;/li>
                &#64;endforeach
            &lt;/ul>
            &lt;a href="&#123;&#123; url()->current() }}">Ввести данные заново&lt;/a>
        &#64;endif
        &lt;form action="&#123;&#123; url()->current() }}" method="GET">
            &lt;input type="text" name="name" required />
            &lt;input type="text" name="login" required />
            &lt;input type="text" name="email" required />
            &lt;input type="text" name="password" required />
            &lt;input type="submit">
        &lt;/form></pre>

        @if (!is_null($data))
            <p>
                Выводим данные в виде ul
            </p>
            <ul>
                @foreach ($data as $inputName => $inputValue)
                    <li>{{ $inputName }} = {{ $inputValue }}</li>
                @endforeach
            </ul>
            <a href="{{ url()->current() }}">Ввести данные заново</a>
        @endif
        <form action="{{ url()->current() }}" method="GET">
            <label>
                Имя:<br />
                <input type="text" name="name" required />
            </label><br />
            <label>
                Логин:<br />
                <input type="text" name="login" required />
            </label><br />
            <label>
                Емаил:<br />
                <input type="text" name="email" required />
            </label><br />
            <label>
                Пароль:<br />
                <input type="text" name="password" required />
            </label><br />

            <input type="submit">
        </form>
        <br />
        <a href="/form/object-request#task7">назад</a>
    @endif
</x-layout>
