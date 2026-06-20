<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>
@elseif ($id == 1)
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
    <a href="/DB/record-where#redordWhereTask1">Назад</a>
@elseif ($id == 2)
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
        $fields = array_keys((array) $data[0][0]);
    @endphp
<table>
    <tr>
    @foreach ($fields as $field)
<th>
    {{ $field }}
    </th>
@endforeach
    </tr>
    @foreach ($data[0] as $user)
<tr>
    @foreach ($fieldNaneArr as $fieldName)
<td>
    {{ $user->$fieldName }}
    </td>
@endforeach
    </tr>
@endforeach
</table>
    <a href="/DB/record-where#redordWhereTask1">Назад</a>
@elseif ($id == 3)
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
    <a href="/DB/record-where#redordWhereTask1">Назад</a>
@elseif ($id == 4)
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
    <a href="/DB/record-where#redordWhereTask1">Назад</a>
@elseif ($id == 5)
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
    <a href="/DB/record-where#redordWhereTask1">Назад</a>
@elseif ($id == 6)
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
    <a href="/DB/record-where#redordWhereTask2">Назад</a>
@elseif ($id == 7)
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
    <a href="/DB/record-where#redordWhereTask3">Назад</a>
@elseif ($id == 8)
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
    <a href="/DB/record-where#redordWhereTask3">Назад</a>
@elseif ($id == 9)
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
    <a href="/DB/record-where#redordWhereTask4">Назад</a>
@elseif ($id == 10)
    <p>
        {{ $text }}
    </p>
    <pre>
// Controller:
DB::table('users')->whereNotBetween('age', [20, 30])->get()

// view:
&lt;ul>
    &#64;foreach ($data as $user)
        &lt;li>
            &#123;&#123; $user->name &#125;&#125; &#123;&#123; $user->age &#125;&#125;
        &lt;/li>
    &#64;endforeach
&lt;/ul>
            </pre>
    <ul>
        @foreach ($data as $user)
            <li>
                {{ $user->name }} {{ $user->age }}
            </li>
        @endforeach
    </ul>
    <a href="/DB/record-where#redordWhereTask6">Назад</a>
@elseif ($id == 11)
    <p>
        {{ $text }}
    </p>
    <pre>
// Controller:
DB::table('users')->whereIn('id', [1, 2, 3, 5])->get()

// view:
&lt;ul>
    &#64;foreach ($data as $user)
        &lt;li>
            &#123;&#123; $user->id &#125;&#125; &#123;&#123; $user->name &#125;&#125;
        &lt;/li>
    &#64;endforeach
&lt;/ul>
            </pre>
    <ul>
        @foreach ($data as $user)
            <li>
                {{ $user->id }} {{ $user->name }}
            </li>
        @endforeach
    </ul>
    <a href="/DB/record-where#redordWhereTask7">Назад</a>
@elseif ($id == 12)
    <p>
        {{ $text }}
    </p>
    <pre>
// Controller:
DB::table('users')->whereID(3)->get()

// view:
&lt;ul>
    &#64;foreach ($data as $user)
        &lt;li>
            &#123;&#123; $user->id &#125;&#125; &#123;&#123; $user->name &#125;&#125;
        &lt;/li>
    &#64;endforeach
&lt;/ul>
            </pre>
    <ul>
        @foreach ($data as $user)
            <li>
                {{ $user->id }} {{ $user->name }}
            </li>
        @endforeach
    </ul>
    <a href="/DB/record-where#redordWhereTask8">Назад</a>
@elseif ($id == 13)
    <p>
        {{ $text }}
    </p>
    <pre>
// Controller:
DB::table('users')->whereName('userName5')->get()

// view:
&lt;ul>
    &#64;foreach ($data as $user)
        &lt;li>
            &#123;&#123; $user->id &#125;&#125; &#123;&#123; $user->name &#125;&#125;
        &lt;/li>
    &#64;endforeach
&lt;/ul>
            </pre>
    <ul>
        @foreach ($data as $user)
            <li>
                {{ $user->id }} {{ $user->name }}
            </li>
        @endforeach
    </ul>
    <a href="/DB/record-where#redordWhereTask8">Назад</a>
@elseif ($id == 14)
    <p>
        {{ $text }}
    </p>
    <pre>
// Controller:
DB::table('users')->whereIdOrAge(3, 20)->get()

// view:
&lt;ul>
    &#64;foreach ($data as $user)
        &lt;li>
            &#123;&#123; $user->id &#125;&#125; &#123;&#123; $user->name &#125;&#125; &#123;&#123; $user->age &#125;&#125;
        &lt;/li>
    &#64;endforeach
&lt;/ul>
            </pre>
    <ul>
        @foreach ($data as $user)
            <li>
                {{ $user->id }} {{ $user->name }} {{ $user->age }}
            </li>
        @endforeach
    </ul>
    <a href="/DB/record-where#redordWhereTask9">Назад</a>
    @endif

</x-layout>
