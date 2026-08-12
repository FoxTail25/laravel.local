<x-layout>
    <x-slot:title>
        Получение данных в Eloquent Laravel
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        <pre>//Controller code:
    'data' => [
        'users' => $users = User::all(),
        'fields' => $users->isNotEmpty() ? array_keys($users->first()->getAttributes()) : []
    ]

//Blade code:
    &lt;table>
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;th>
                &#123;&#123; $field }}
                &lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data['users'] as $user)
            &lt;tr>
                &#64;foreach ($data['fields'] as $field)
                    &lt;td>
                    &#123;&#123; $user->$field }}
                    &lt;/td>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table></pre>
        <h5>
            Результат:
        </h5>
        <table>
            <thead>
                <tr>
                    @foreach ($data['fields'] as $field)
                        <th>
                            {{ $field }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data['users'] as $user)
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <td>
                                {{ $user->$field }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task1">Назад</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        <p class="text-danger">
            Что бы код продолжал работать с минимальными изменениями. Доработает его так, что бы в переменной $users
            лежала
            коллекция! Метод ->filter() нужен что бы убрать null если метод ->firs() никого не найдёт
        </p>
        <pre>
//Controller code:
$users = collect([User::where('age', 30)->first()])->filter();
$fields = $users->isNotEmpty()
    ? array_keys($users->first()->getAttributes())
    : [];
return [
    'users' => $users,
    'fields' => $fields
];


//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        <h5>
            Результат:
        </h5>
        @if (count($data['fields']) > 1)
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task2">Назад</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />
        <pre>
//Controller code:
    // Получаем коллекцию, даже если там всего один ID
    $users = User::where('id', 3)->get();

    // Если в коллекции есть хоть один элемент, то вернутся его атрибуты.
    // Если коллекция пустая вернётся пустой массив
    $fields = $users->isNotEmpty() ? array_keys($users->first()->getAttributes()) : [];

    return [
        'users' => $users, // Здесь будет коллекция
        'fields' => $fields, // Здесь будет массив с наименованием полей
    ];

//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        <h5>
            Результат:
        </h5>
        @if (count($data['fields']) > 1)
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task3">Назад</a>
    @elseif ($id == 4)
        <x-page.tasks.header :text="$text" />
        <pre>
//Controller code:
$users = User::find([3,4,5]);
$fields = $users->isNotEmpty()
    ? array_keys($users->first()->getAttributes())
    : [];
return [
    'users' => $users,
    'fields' => $fields
];

//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        <h5>
            Результат:
        </h5>
        @if (count($data['fields']) > 1)
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task3">Назад</a>
    @elseif ($id == 5)
        <x-page.tasks.header :text="$text" />
        <pre>
//Controller code:
    'data' => function () {
        $users = User::where('age', 30)->get();
        $fields = $users->isNotEmpty()
            ? array_keys($users->first()->getAttributes())
            : [];
        return [
            'users' => $users,
            'fields' => $fields
        ];

//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        @if (count($data['fields']) > 1)
            <h5>
                Результат:
            </h5>
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task4">Назад</a>
    @elseif ($id == 6)
        <x-page.tasks.header :text="$text" />
        <pre>
//Controller code:
    'data' => function () {
        $users = User::whereBetween('salary', [1000, 3000])->orderBy('salary')->get();
        $fields = $users->isNotEmpty()
            ? array_keys($users->first()->getAttributes())
            : [];
        return [
            'users' => $users,
            'fields' => $fields
        ];

//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        @if (count($data['fields']) > 1)
            <h5>
                Результат:
            </h5>
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task4">Назад</a>
    @elseif ($id == 7)
        <x-page.tasks.header :text="$text" />
        Если вы не укажете сортировку, база данных вернет записи в случайном порядке (как они физически лежат на диске).
        В итоге при каждом обновлении страницы «пропущенные» 3 записи могут быть разными.Чтобы результат был
        предсказуемым, всегда добавляйте сортировку:
        <pre>User::orderBy('id')->skip(3)->get();</pre>
        В Laravel метод skip() под капотом транслируется в SQL-оператор OFFSET. Чтобы запрос стал синтаксически
        корректным для MySQL, вы обязаны дополнить его методом take() (который превращается в LIMIT). А так как нам
        нужны все записи:
        <pre>User::orderBy('id')->skip(3)->take(PHP_INT_MAX)->get();</pre>
        <pre>
//Controller code:
    'data' => function () {
        $users = User::orderBy('id')->skip(3)->take(PHP_INT_MAX)->get();
        $fields = $users->isNotEmpty()
            ? array_keys($users->first()->getAttributes())
            : [];
        return [
            'users' => $users,
            'fields' => $fields
        ];

//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        @if (count($data['fields']) > 1)
            <h5>
                Результат:
            </h5>
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task4">Назад</a>
    @elseif ($id == 8)
        <x-page.tasks.header :text="$text" />
        Если вы не укажете сортировку, база данных вернет записи в случайном порядке (как они физически лежат на диске).
        В итоге при каждом обновлении страницы «пропущенные» 3 записи могут быть разными.Чтобы результат был
        предсказуемым, всегда добавляйте сортировку:
        <pre>User::orderBy('id')->skip(3)->get();</pre>
        В Laravel метод skip() под капотом транслируется в SQL-оператор OFFSET. Чтобы запрос стал синтаксически
        корректным для MySQL, вы обязаны дополнить его методом take() (который превращается в LIMIT). А так как нам
        нужно только 5 записей:
        <pre>User::orderBy('id')->skip(3)->take(5)->get();</pre>
        <pre>
//Controller code:
    'data' => function () {
        $users = User::orderBy('id')->skip(3)->take(5)->get();
        $fields = $users->isNotEmpty()
            ? array_keys($users->first()->getAttributes())
            : [];
        return [
            'users' => $users,
            'fields' => $fields
        ];

//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        <h5>
            Результат:
        </h5>
        @if (count($data['fields']) > 1)
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task4">Назад</a>
    @elseif ($id == 9)
        <x-page.tasks.header :text="$text" />
        Так же можно использовать метод User::find([1, 2, 3, 4, 5]); (Метод find() в Laravel очень умен: если в него
        передать массив, он автоматически понимает, что нужно найти все эти записи по первичному ключу) в конце метод
        ->get() вызывать не нужно, find() сразу вернет коллекцию
        <pre>
//Controller code:
    'data' => function () {
        $users = User::whereIn('id', [1, 3, 4, 5])->get();
        $fields = $users->isNotEmpty()
            ? array_keys($users->first()->getAttributes())
            : [];
        return [
            'users' => $users,
            'fields' => $fields
        ];

//Blade code:
&#64;if (count($data['fields']) > 1)
&lt;table>
    &lt;tr>
        &#64;foreach ($data['fields'] as $field)
            &lt;th>
            &#123;&#123; $field }}
            &lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>
                &#123;&#123; $user->$field }}
                &lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
&lt;/table></pre>
        <h5>
            Результат:
        </h5>
        @if (count($data['fields']) > 1)
            <table>
                <thead>
                    <tr>
                        @foreach ($data['fields'] as $field)
                            <th>
                                {{ $field }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['users'] as $user)
                        <tr>
                            @foreach ($data['fields'] as $field)
                                <td>
                                    {{ $user->$field }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>Пользователей с такими параметрами запроса нет</h3>
        @endif
        <br />
        <br />
        <a href="{{ route('eloquent-get-data') }}#task4">Назад</a>

    @endif

</x-layout>
