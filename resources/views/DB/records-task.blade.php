<x-layout>
    <x-slot:title>
        Query Builder task
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>Получаем в контроллере данные из БД:
                <pre>&lt;?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB; // подключаем фасад DB

    class UserController extends Controller
    {
        public function getAllRecord()
        {
            /* Запрос выполнится только тогда, когда таблица РЕАЛЬНО существует
            Иначе придётся комментировать роут, который ссылается на этот код
            */
            if (Schema::hasTable('users')) {

                $allUsers = DB::table('users')->get();
                return $allUsers;
            }
        }
    }</pre>

            </li>
            <li>
                Отображаем данные в представлении:
                <pre>        &lt;table>
            &lt;tr>
                &lt;th>id&lt;/th>
                &lt;th>name&lt;/th>
                &lt;th>email&lt;/th>
            &lt;/tr>
            &#64;foreach ($allUsers as $user)
                &lt;tr>
                    &lt;th>&#123;&#123; $user->id }}&lt;/th>
                    &lt;th>&#123;&#123; $user->name }}&lt;/th>
                    &lt;th>&#123;&#123; $user->email }}&lt;/th>
                &lt;/tr>
            &#64;endforeach
        &lt;/table></pre>
            </li>
        </ol>
        <h5>
            Результат:
        </h5>
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
            </tr>
            @foreach ($data as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                </tr>
            @endforeach
        </table>
        <br />
        <br />
        <a href="{{ route('qb-record') }}#recordTask1">Назад к задачам</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        <ol>
            <li>
                В контроллере получаем данные из БД
                <pre>DB::table('users')->select('name', 'email')->get();</pre>
            </li>
            <li>
                Отображаем данные в представении:
                <pre>&lt;table>
    &lt;tr>
        &#64;foreach (array_keys((array) $data[0][0]) as $fieldName)
            &lt;th>&#123;&#123; $fieldName }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data[0] as $user)
        &lt;tr>
            &lt;th>&#123;&#123; $user->name }}&lt;/th>
            &lt;th>&#123;&#123; $user->email }}&lt;/th>
        &lt;/tr>
    &#64;endforeach
&lt;/table></pre>
            </li>
        </ol>
        <h5>
            Результат:
        </h5>
        <table>
            <tr>
                @foreach (array_keys((array) $data[0][0]) as $fieldName)
                    <th>{{ $fieldName }}</th>
                @endforeach
            </tr>
            @foreach ($data[0] as $user)
                <tr>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                </tr>
            @endforeach
        </table>
        <br />
        <br />
        <a href="{{ route('qb-record') }}#recordTask1">Назад к задачам</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />
        <pre>// Получение данныех в контроллере
$data = DB::table('users')->select('name', 'email as user_email')->get()

// Отображени данных в предствлении:
&lt;table>
    &lt;tr>
        &#64;foreach (array_keys((array) $data[0][0]) as $fieldName)
            &lt;th>&#123;&#123; $fieldName }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data[0] as $user)
        &lt;tr>
            &lt;th>&#123;&#123; $user->name }}&lt;/th>
            &lt;th>&#123;&#123; $user->user_email }}&lt;/th>
        &lt;/tr>
    &#64;endforeach
&lt;/table>
</pre>
        <h5>
            Результат:
        </h5>
        <table>
            <tr>
                @foreach (array_keys((array) $data[0][0]) as $fieldName)
                    <th>{{ $fieldName }}</th>
                @endforeach
            </tr>
            @foreach ($data[0] as $user)
                <tr>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->user_email }}</th>
                </tr>
            @endforeach
        </table>
        <br />
        <br />
        <a href="{{ route('qb-record') }}#recordTask2">Назад к задачам</a>
    @elseif ($id == 4)
        <x-page.tasks.header :text="$text" />
        <pre>
// Controller:
DB::table('users')->pluck('name')

// view:
&lt;ul>
    &#64;foreach ($data as $user)
        &lt;li>
            &#123;&#123; $user &#125;&#125;
        &lt;/li>
    &#64;endforeach
&lt;/ul>
            </pre>
        <h5>
            Результат:
        </h5>
        <ul>
            @foreach ($data as $user)
                <li>
                    {{ $user }}
                </li>
            @endforeach
        </ul>
        <br />
        <br />
        <a href="{{ route('qb-record') }}#recordTask3">Назад к задачам</a>
    @elseif ($id == 5)
        <x-page.tasks.header :text="$text" />
        <pre>// Получение данных в Controllere:
    'data' => Schema::hasTable('users') ?? DB::table('users')->first();

// Blade Code:
    &#64;php
    $dataArr = (array) $data;
    &#64;endphp
    &lt;table>
        &lt;tr>
            &#64;foreach ($dataArr as $fieldName => $value)
                &lt;th>&#123;&#123; $fieldName &#125;&#125;&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &lt;tr>
            &#64;foreach ($dataArr as $fieldName => $value)
                &lt;td>&#123;&#123; $value &#125;&#125;&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &lt;/table>

            </pre>
        @php
            $dataArr = (array) $data;
        @endphp
        <h5>
            Результат:
        </h5>
        <table>
            <tr>
                @foreach ($dataArr as $fieldName => $value)
                    <th>{{ $fieldName }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($dataArr as $fieldName => $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        </table>

        <br />
        <br />
        <a href="{{ route('qb-record') }}#recordsTask5">Назад к задачам</a>
    @elseif ($id == 6)
        <x-page.tasks.header :text="$text" />
        <pre>// Получение данных в Controllere:
    'data' => Schema::hasTable('users') ?? DB::table('users')->take(3)->get;

// Blade Code:
    &#123;&#123;-- Проерка на наличие данных --}}
    &#64;if ($data->isNotEmpty())
    &#64;php
        // Безопасно получаем имена полей из первого объекта
        $fields = array_keys(get_object_vars($data->first()));
    &#64;endphp
        &lt;table>
            &lt;tr>
                &#64;foreach ($fields as $field)
                    &lt;th>&#123;&#123; $field &#125;&#125;&lt;/th>
                &#64;endforeach
            &lt;/tr>
            &#64;foreach ($data as $user)
            &lt;tr>
                &#123;&#123;-- Динамический вывод свойства объекта --}}
                &#64;foreach ($fields as $field)
                    &lt;td>&#123;&#123; $user->$field &#125;&#125;&lt;/td>
                &#64;endforeach
                &lt;/tr>
            &#64;endforeach
        &lt;/table>
    &#64;else
        &lt;p>Нет данных для отображения.&lt;/p>
    &#64;endif
            </pre>
        <h5>
            Результат:
        </h5>
        {{-- Проерка на наличие данных --}}
        @if ($data->isNotEmpty())
            @php
                // Безопасно получаем имена полей из первого объекта
                $fields = array_keys(get_object_vars($data->first()));
            @endphp
            <table>
                <tr>
                    @foreach ($fields as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                </tr>
                @foreach ($data as $user)
                    <tr>
                        {{-- Динамический вывод свойства объекта --}}
                        @foreach ($fields as $field)
                            <td>{{ $user->$field }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @else
            <p>Нет данных для отображения.</p>
        @endif
        <br />
        <br />
        <a href="{{ route('qb-record') }}#recordTask6">Назад к задачам</a>
    @elseif ($id == 7)
        <x-page.tasks.header :text="$text" />
        <pre>
    // Получение данных в Controllere:
    'data' => Schema::hasTable('users') ?? DB::table('users')->skip(2)->take(3)->get;

    // Blade Code:
    &#123;&#123;-- Проерка на наличие данных --}}
    &#64;if ($data->isNotEmpty())
    &#64;php
        // Безопасно получаем имена полей из первого объекта
        $fields = array_keys(get_object_vars($data->first()));
    &#64;endphp
        &lt;table>
            &lt;tr>
                &#64;foreach ($fields as $field)
                    &lt;th>&#123;&#123; $field &#125;&#125;&lt;/th>
                &#64;endforeach
            &lt;/tr>
            &#64;foreach ($data as $user)
            &lt;tr>
                &#123;&#123;-- Динамический вывод свойства объекта --}}
                &#64;foreach ($fields as $field)
                    &lt;td>&#123;&#123; $user->$field &#125;&#125;&lt;/td>
                &#64;endforeach
                &lt;/tr>
            &#64;endforeach
        &lt;/table>
    &#64;else
        &lt;p>Нет данных для отображения.&lt;/p>
    &#64;endif
            </pre>
        <h5>
            Результат:
        </h5>
        {{-- Проерка на наличие данных --}}
        @if ($data->isNotEmpty())
            @php
                // Безопасно получаем имена полей из первого объекта
                $fields = array_keys(get_object_vars($data->first()));
            @endphp
            <table>
                <tr>
                    @foreach ($fields as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                </tr>
                @foreach ($data as $user)
                    <tr>
                        {{-- Динамический вывод свойства объекта --}}
                        @foreach ($fields as $field)
                            <td>{{ $user->$field }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @else
            <p>Нет данных для отображения.</p>
        @endif
        <br />
        <br />
        <a href="{{ route('qb-record') }}#recordTask6">Назад к задачам</a>
    @endif
</x-layout>
