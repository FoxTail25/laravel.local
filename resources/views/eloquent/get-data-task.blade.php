<x-layout>
    <x-slot:title>
        Получение данных в Eloquent Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
//Controller code:
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
        <a href="/eloquent/get-data#task1">Назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
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
        <a href="/eloquent/get-data#task2">Назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
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
        <a href="/eloquent/get-data#task2">Назад</a>
    @elseif ($id == 4)
        <p>
            {{ $text }}
        </p>
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
        <a href="/eloquent/get-data#task2">Назад</a>
    @elseif ($id == 5)
        <p>
            {{ $text }}
        </p>
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
        <a href="/eloquent/get-data#task2">Назад</a>
    @elseif ($id == 6)
        <p>
            {{ $text }}
        </p>
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
        <a href="/eloquent/get-data#task2">Назад</a>
    @elseif ($id == 7)
        <p>
            {{ $text }}
        </p>
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
        <a href="/eloquent/get-data#task4">Назад</a>
    @elseif ($id == 8)
        <p>
            {{ $text }}
        </p>
        <pre>
//Controller code:
$users = User::find(3);
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
        <a href="/eloquent/get-data#task4">Назад</a>
    @elseif ($id == 9)
        <p>
            {{ $text }}
        </p>
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
        <a href="/eloquent/get-data#task2">Назад</a>
    @endif

</x-layout>
