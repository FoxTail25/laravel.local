<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    @if ($id == 1)

        <p>
            {{ $text }}
        </p>
        <pre>
&lt;?php

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
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
            </tr>
            @foreach ($data[0] as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                </tr>
            @endforeach
        </table>
        <a href="/DB/records#recordTask1">Назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
                DB::table('users')->select('name', 'email')->get();
            </pre>
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
        <a href="/DB/records#recordTask1">Назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
            DB::table('users')->select('name', 'email as user_email')->get()            </pre>
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
        <a href="/DB/records#recordTask2">Назад</a>
    @elseif ($id == 4)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->pluck('name')

// view:
&lt;h3>user names:&lt;/h3>
&lt;ul>
    &#64;foreach ($data as $user)
        &lt;li>
            &#123;&#123; $user &#125;&#125;
        &lt;/li>
    &#64;endforeach
&lt;/ul>
            </pre>
        <h3>user names:</h3>
        <ul>
            @foreach ($data as $user)
                <li>
                    {{ $user }}
                </li>
            @endforeach
        </ul>
        <a href="/DB/records#recordTask3">Назад</a>
    @elseif ($id == 5)
        <p>
            {{ $text }}
        </p>
        <pre>

    // Получение данных в Controllere:
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

        <a href="/DB/records#recordsTask5">Назад</a>
    @endif
</x-layout>
