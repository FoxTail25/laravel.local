<x-layout>
    <x-slot:title>
        Задачи DB в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->orderBy('age')->get()

//View:
&#64;php
    $fields = collect($data->first())->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data as $user)
        &lt;tr>
            &#64;foreach ($fields as $field)
            &lt;td>&#123;&#123; $user->$field }}&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table>
        </pre>
        @php
            $fields = collect($data->first())->keys()->toArray();
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
        <a href="/DB/record-sort/#recordSort1">Назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->orderBy('salary', 'desk')->get()

//View:
&#64;php
    $fields = collect($data->first())->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data as $user)
        &lt;tr>
            &#64;foreach ($fields as $field)
            &lt;td>&#123;&#123; $user->$field }}&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table>
        </pre>
        @php
            $fields = collect($data->first())->keys()->toArray();
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
        <a href="/DB/record-sort/#recordSort1">Назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->oldest()->get()

//View:
&#64;php
    $fields = collect($data->first())->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data as $user)
        &lt;tr>
            &#64;foreach ($fields as $field)
            &lt;td>&#123;&#123; $user->$field }}&lt;/th>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table>
        </pre>
        @php
            $fields = collect($data->first())->keys()->toArray();
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
        <a href="/DB/record-sort/#recordSort2">Назад</a>
    @elseif ($id == 4)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->where('age', '>', 20)->latest()->get()

//View:
&#64;php
    $fields = collect($data->first())->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data as $user)
        &lt;tr>
            &#64;foreach ($fields as $field)
            &lt;td>&#123;&#123; $user->$field }}&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table>
        </pre>
        @php
            $fields = collect($data->first())->keys()->toArray();
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
        <a href="/DB/record-sort/#recordSort2">Назад</a>
    @elseif ($id == 5)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->where('age', '<', 20)->latest('updated_at')->get()

//View:
&#64;php
    $fields = collect($data->first())->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data as $user)
        &lt;tr>
            &#64;foreach ($fields as $field)
            &lt;td>&#123;&#123; $user->$field }}&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table>
        </pre>
        @php
            $fields = collect($data->first())->keys()->toArray();
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
        <a href="/DB/record-sort/#recordSort3">Назад</a>
    @elseif ($id == 6)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->inRandomOrder()->get()

//View:
&#64;php
    $fields = collect($data->first())->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data as $user)
        &lt;tr>
            &#64;foreach ($fields as $field)
            &lt;td>&#123;&#123; $user->$field }}&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table>
        </pre>
        @php
            $fields = collect($data->first())->keys()->toArray();
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
        <a href="/DB/record-sort/#recordSort4">Назад</a>
    @elseif ($id == 7)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->inRandomOrder()->first()

//View:
&#64;php
    $fields = collect($data)->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;td>&#123;&#123; $data->$field }}&lt;/td>
        &#64;endforeach
    &lt;/tr>
&lt;/table>
        </pre>
        @php
            $fields = collect($data)->keys()->toArray();
        @endphp
        <table>
            <tr>
                @foreach ($fields as $field)
                    <th>{{ $field }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($fields as $field)
                    <td>{{ $data->$field }}</td>
                @endforeach
            </tr>
        </table>
        <a href="/DB/record-sort/#recordSort4">Назад</a>
    @elseif ($id == 8)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->whereBetween('age', [20, 30])->inRandomOrder()->get()

//View:
&#64;php
    $fields = collect($data->first())->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &#64;foreach ($data as $user)
        &lt;tr>
            &#64;foreach ($fields as $field)
            &lt;td>&#123;&#123; $user->$field }}&lt;/td>
            &#64;endforeach
        &lt;/tr>
    &#64;endforeach
&lt;/table>
        </pre>
        @php
            $fields = collect($data->first())->keys()->toArray();
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
        <a href="/DB/record-sort/#recordSort4">Назад</a>
    @elseif ($id == 9)
        <p>
            {{ $text }}
        </p>
        <pre>
// Controller:
DB::table('users')->whereBetween('age', [20, 30])->inRandomOrder()->first()

//View:
&#64;php
    $fields = collect($data)->keys()->toArray();
&#64;endphp
&lt;table>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;th>&#123;&#123; $field }}&lt;/th>
        &#64;endforeach
    &lt;/tr>
    &lt;tr>
        &#64;foreach ($fields as $field)
        &lt;td>&#123;&#123; $data->$field }}&lt;/td>
        &#64;endforeach
    &lt;/tr>
&lt;/table>
        </pre>
        @php
            $fields = collect($data)->keys()->toArray();
        @endphp
        <table>
            <tr>
                @foreach ($fields as $field)
                    <th>{{ $field }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($fields as $field)
                    <td>{{ $data->$field }}</td>
                @endforeach
            </tr>
        </table>
        <a href="/DB/record-sort/#recordSort4">Назад</a>
    @endif

</x-layout>
