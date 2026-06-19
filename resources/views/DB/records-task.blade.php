<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    @if ($id == 1)
        <div>
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
        </div>
    @elseif ($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
                DB::table('users')->select('name', 'email')->get();
            </pre>
            {{-- {{ var_dump($data[0]) }} --}}
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
        </div>
    @elseif ($id == 3)
        <div>
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
        </div>
    @elseif ($id == 4)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
    // UserController method:
    public function getWhere(string $fieldName, string  $value, $condition = null)
    {
        if (Schema::hasTable('users')) {
            if ($condition) {

                $answer = DB::table('users')->where($fieldName, $condition, $value)->get();
                return $answer;
            } else {
                $answer = DB::table('users')->where($fieldName,  $value)->get();
                return $answer;
            }
        }
    }
        // Получение данных:
    'data' => [(new UserController)->getWhere('age', 30)]
    // Blade Code:
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName }}&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName }}&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
            </pre>
            <table>
                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <tr>
                    @foreach ($fieldNaneArr as $fieldName)
                        <th>{{ $fieldName }}</th>
                    @endforeach
                </tr>
                @foreach ($data[0] as $user)
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $user->$fieldName }}</th>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    @elseif ($id == 5)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
// UserController method:
public function getWhere(string $fieldName, string  $value, $condition = null)
{
    if (Schema::hasTable('users')) {
        if ($condition) {

            $answer = DB::table('users')->where($fieldName, $condition, $value)->get();
            return $answer;
        } else {
            $answer = DB::table('users')->where($fieldName,  $value)->get();
            return $answer;
        }
    }
}
// Получение данных:
'data' => [(new UserController)->getWhere('age', 30, '!=')]
// Blade Code:
&lt;table>
    &#64;php
        $fieldNaneArr = array_keys((array) $data[0][0]);
    &#64;endphp
    &lt;tr>
        &#64;foreach ($fieldNaneArr as $fieldName)
            &lt;th>&#123;&#123; $fieldName }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data[0] as $user)
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $user->$fieldName }}&lt;/th>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table></pre>
        @php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        @endphp
        <table>
            <tr>
                @foreach ($fieldNaneArr as $fieldName)
<th>{{ $fieldName }}</th>
@endforeach
            </tr>
            @foreach ($data[0] as $user)
<tr>
                    @foreach ($fieldNaneArr as $fieldName)
<th>{{ $user->$fieldName }}</th>
@endforeach
                </tr>
@endforeach
        </table>
    </div>
@elseif ($id == 6)
<div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function getWhere(string $fieldName, string  $value, $condition = null)
    {
        if (Schema::hasTable('users')) {
            if ($condition) {

                $answer = DB::table('users')->where($fieldName, $condition, $value)->get();
                return $answer;
            } else {
                $answer = DB::table('users')->where($fieldName,  $value)->get();
                return $answer;
            }
        }
    }
    // Получение данных:
    'data' => [(new UserController)->getWhere('age', 30, '>')]
    // Blade Code: !!!Добавляем проверку на наличие пользователей!!!
    &#64;if(count($data[0]) > 0)
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName }}&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName }}&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
            </pre>
            @if (count($data[0]) > 0)

                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <table>
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $fieldName }}</th>
                        @endforeach
                    </tr>
                    @foreach ($data[0] as $user)
                        <tr>
                            @foreach ($fieldNaneArr as $fieldName)
                                <th>{{ $user->$fieldName }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Пользователей с такими данными нет</h3>
            @endif
        </div>
    @elseif ($id == 7)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function getWhere(string $fieldName, string  $value, $condition = null)
    {
        if (Schema::hasTable('users')) {
            if ($condition) {

                $answer = DB::table('users')->where($fieldName, $condition, $value)->get();
                return $answer;
            } else {
                $answer = DB::table('users')->where($fieldName,  $value)->get();
                return $answer;
            }
        }
    }
    // Получение данных:
    'data' => [(new UserController)->getWhere('age', 30, '<')]
    // Blade Code: !!!Добавляем проверку на наличие пользователей!!!
    &#64;if(count($data[0]) > 0)
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName }}&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName }}&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
            </pre>
            @if (count($data[0]) > 0)
                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <table>
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $fieldName }}</th>
                        @endforeach
                    </tr>
                    @foreach ($data[0] as $user)
                        <tr>
                            @foreach ($fieldNaneArr as $fieldName)
                                <th>{{ $user->$fieldName }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Пользователей с такими данными нет</h3>
            @endif
        </div>
    @elseif ($id == 8)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function getWhere(string $fieldName, string  $value, $condition = null)
    {
        if (Schema::hasTable('users')) {
            if ($condition) {

                $answer = DB::table('users')->where($fieldName, $condition, $value)->get();
                return $answer;
            } else {
                $answer = DB::table('users')->where($fieldName,  $value)->get();
                return $answer;
            }
        }
    }
    // Получение данных:
    'data' => [(new UserController)->getWhere('age', 30, '<')]
    // Blade Code: !!!Добавляем проверку на наличие пользователей!!!
    &#64;if(count($data[0]) > 0)
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName }}&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName }}&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
            </pre>
            @if (count($data[0]) > 0)
                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <table>
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $fieldName }}</th>
                        @endforeach
                    </tr>
                    @foreach ($data[0] as $user)
                        <tr>
                            @foreach ($fieldNaneArr as $fieldName)
                                <th>{{ $user->$fieldName }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Пользователей с такими данными нет</h3>
            @endif
        </div>
    @elseif ($id == 9)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function get2Where()
    {
        if (Schema::hasTable('users')) {
            $answer = DB::table('users')
                ->where('age', '>', '20')
                ->where('age', '<', '30')
                ->get();
            return $answer;
        }
    }
    // Получение данных:
    'data' => [(new UserController)->get2Where()]
    // Blade Code: !!!Добавляем проверку на наличие пользователей!!!
    &#64;if(count($data[0]) > 0)
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName &#125;&#125;&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName &#125;&#125;&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
            </pre>
            @if (count($data[0]) > 0)
                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <table>
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $fieldName }}</th>
                        @endforeach
                    </tr>
                    @foreach ($data[0] as $user)
                        <tr>
                            @foreach ($fieldNaneArr as $fieldName)
                                <th>{{ $user->$fieldName }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Пользователей с такими данными нет</h3>
            @endif
        </div>
    @elseif ($id == 10)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function getOrWhere()
    {
        if (Schema::hasTable('users')) {
            $answer = DB::table('users')
                ->where('age', '30')
                ->orWhere('id', '>', '4')
                ->get();
            return $answer;
        }
    }
    // Получение данных:
    'data' => [(new UserController)->getOrWhere()]
    // Blade Code: !!!Добавляем проверку на наличие пользователей!!!
    &#64;if(count($data[0]) > 0)
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName &#125;&#125;&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName &#125;&#125;&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
            </pre>
            @if (count($data[0]) > 0)
                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <table>
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $fieldName }}</th>
                        @endforeach
                    </tr>
                    @foreach ($data[0] as $user)
                        <tr>
                            @foreach ($fieldNaneArr as $fieldName)
                                <th>{{ $user->$fieldName }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Пользователей с такими данными нет</h3>
            @endif
        </div>
    @elseif ($id == 11)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function getOrWhere2()
    {
        if (Schema::hasTable('users')) {
            $answer = DB::table('users')
                ->where('age', '30')
                ->orWhere('salary', '500')
                ->orWhere('id', '>', '9')
                ->get();
            return $answer;
        }
    }
    // Получение данных:
    'data' => [(new UserController)->getOrWhere2()]
    // Blade Code: !!!Добавляем проверку на наличие пользователей!!!
    &#64;if(count($data[0]) > 0)
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName &#125;&#125;&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName &#125;&#125;&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
            </pre>
            @if (count($data[0]) > 0)
                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <table>
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $fieldName }}</th>
                        @endforeach
                    </tr>
                    @foreach ($data[0] as $user)
                        <tr>
                            @foreach ($fieldNaneArr as $fieldName)
                                <th>{{ $user->$fieldName }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Пользователей с такими данными нет</h3>
            @endif
        </div>
    @elseif ($id == 12)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function getComplexWhere()
    {
        if (Schema::hasTable('users')) {
            $answer = DB::table('users')
                ->where('salary', '500')
                ->orWhere(function ($query) {
                    $query
                        ->where('age', '>', 20)
                        ->where('age', '<', 30);
                })
                ->get();
            return $answer;
        }
    }
    // Получение данных:
    'data' => [(new UserController)->getComplexWhere()]
    // Blade Code: !!!Добавляем проверку на наличие пользователей!!!
    &#64;if(count($data[0]) > 0)
    &lt;table>
        &#64;php
            $fieldNaneArr = array_keys((array) $data[0][0]);
        &#64;endphp
        &lt;tr>
            &#64;foreach ($fieldNaneArr as $fieldName)
                &lt;th>&#123;&#123; $fieldName &#125;&#125;&lt;/th>
            &#64;endforeach
        &lt;/tr>
        &#64;foreach ($data[0] as $user)
            &lt;tr>
                &#64;foreach ($fieldNaneArr as $fieldName)
                    &lt;th>&#123;&#123; $user->$fieldName &#125;&#125;&lt;/th>
                &#64;endforeach
            &lt;/tr>
        &#64;endforeach
    &lt;/table>
    &#64;else
    &lt;h3>Пользователей с такими данными нет&lt;/h3>
    &#64;endif
            </pre>
            @if (count($data[0]) > 0)
                @php
                    $fieldNaneArr = array_keys((array) $data[0][0]);
                @endphp
                <table>
                    <tr>
                        @foreach ($fieldNaneArr as $fieldName)
                            <th>{{ $fieldName }}</th>
                        @endforeach
                    </tr>
                    @foreach ($data[0] as $user)
                        <tr>
                            @foreach ($fieldNaneArr as $fieldName)
                                <th>{{ $user->$fieldName }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Пользователей с такими данными нет</h3>
            @endif
        </div>
    @elseif ($id == 13)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>

    // UserController method:
    public function getWhereFirst($field, $value)
    {
        if (Schema::hasTable('users')) {
            $answer = DB::table('users')
                ->where($field, $value)
                ->first();
            return $answer;
        }
    }

    // Получение данных:
    'data' => [(new UserController)->getWhereFirst()]

    // Blade Code:
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
                $dataArr = (array) $data[0];
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

        </div>
    @elseif ($id == 14)
        <div>
            <p>
                {{ $text }}
            </p>
            @php
                $fields = array_keys($data->first()->getAttributes());
            @endphp
            <table>
                <tr>
                    @foreach ($fields as $field)
                        <th>{{ $field }}</th>
                    @endforeach
                </tr>
                @foreach ($data as $user)
                    <tr>
                        @foreach ($fields as $field)
                            <td>{{ $user->$field }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>

        </div>
    @endif
    <a href="/DB/records#record">Назад</a>
</x-layout>
