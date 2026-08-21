<x-layout>
    <x-slot:title>
        Практика на CRUD в Laravel
    </x-slot:title>
    <h2>
        Практика на CRUD в Laravel
    </h2>
    <hr />
    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        <b>Код в методе контроллера:</b>
        <pre>
// Получаем всех пользователей из базы
    $users = User::all();
// Получаем названия всех полей.
    $fields = array_keys($users->first()->toArray());
// Отправляем данные в представление 'ViewName'
    return view('viewName', [
        'data' => [
            'users' => $users,
            'fields' => $fields
        ]
    ]);</pre>

        <b>Код в представлении viewName:</b>
        <pre>&lt;table>
    &lt;tr>
        // формируем заголовки таблицы
        &#64;foreach ($data['fields'] as $field)
            &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    // формируем строки с данными юзеров
    &#64;foreach ($data['users'] as $user)
        &lt;tr>
            &#64;foreach ($data['fields'] as $field)
                &lt;td>&#123;&#123; $user->$field }}&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
</table></pre>
        <h5>Результат:</h5>
        <table>
            <tr>
                {{-- формируем заголовки таблицы --}}
                @foreach ($data['fields'] as $field)
                    <th>{{ $field }}</th>
                @endforeach
            </tr>
            {{-- формируем строки с данными юзеров --}}
            @foreach ($data['users'] as $user)
                <tr>
                    @foreach ($data['fields'] as $field)
                        <td>{{ $user->$field }}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        <br />
        <br />
        <a href="{{ route('CRUD-practice') }}#tasks">Назад к задачам</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        <br />
        <br />
        <a href="{{ route('CRUD-practice') }}#tasks">Назад к задачам</a>
    @endif
</x-layout>
