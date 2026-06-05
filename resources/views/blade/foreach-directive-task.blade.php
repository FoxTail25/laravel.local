<x-layout>
    <x-slot:title>
        blade - циклы
    </x-slot:title>
    <style>
        table {
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 16px;
            text-align: left;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        tbody {
            background-color: #f1f3f5;
            cursor: pointer;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
            color: #333333
        }
    </style>
    <h2>
        Задача на циклы в Blade в Laravel
    </h2>
    @if($id == 1)
    <p>{{$text}}</p>
    <ul>
        @foreach($data['arr'] as $elem)
        <li>{{$elem}}</li>
        @endforeach
    </ul>
    @elseif($id == 2)
    <p>{{$text}}</p>
    <ul>
        @foreach($data['arr'] as $elem)
        <li>{{$elem*$elem}}</li>
        @endforeach
    </ul>
    @elseif($id == 3)
    <p>{{$text}}</p>
    <ul>
        @foreach($data['arr'] as $elem)
        <li>{{sqrt($elem)}}</li>
        @endforeach
    </ul>
    @elseif($id == 4)
    <p>{{$text}}</p>
    <ul>
        @foreach($data['arr'] as $key => $elem)
        <li>{{$key}} {{$elem}}</li>
        @endforeach
    </ul>
    @elseif($id == 5)
    <p>{{$text}}</p>
    <ul>
        @foreach($data['arr'] as $key => $elem)
        <li>{{$key + 1}} {{$elem}}</li>
        @endforeach
    </ul>
    @elseif($id == 6)
    <p>{{$text}}</p>
    <ul>
        @foreach($data['arr'] as $elem)
        @if($elem % 2 ==0)
        <li>{{$elem}}</li>
        @endif
        @endforeach
    </ul>
    @elseif($id == 7)
    <p>{{$text}}</p>
    <!-- в $data[0] лежит массив -->
    @if(is_array($data[0]))
    <ul>
        @foreach($data[0] as $elem)
        <li>{{$elem}}</li>
        @endforeach
    </ul>
    @else
    <p>$data[0]</p>
    @endif
    <!-- в $data[0] лежит число -->
    @if(is_array($data[1]))
    <ul>
        @foreach($data[1] as $elem)
        <li>{{$elem}}</li>
        @endforeach
    </ul>
    @else
    <p>{{$data[1]}}</p>
    @endif
    @elseif($id == 8)
    <p>{{$text}}</p>
    <table>
        <tbody>
            @foreach($data as $row)
            <tr>
                @foreach($row as $elem)
                <td>{{$elem}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($id == 9)
    <p>
        {{ $text }}
    </p>
    <ul>
        @foreach($data['employees'] as $employee)
        <li>{{$employee['name']}} {{$employee['surname']}} {{$employee['salary']}}</li>
        @endforeach
    </ul>
    @elseif($id == 10)
    <p>
        {{ $text }}
    </p>
    <table>
        <tbody>
            <tr>
                @foreach (array_keys($data['employees'][0]) as $thead)
                <th>{{ $thead }}</th>
                @endforeach
            </tr>
            @foreach($data['employees'] as $employee)
            <tr>
                @foreach($employee as $employeeData)
                <td>{{$employeeData}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($id == 11)

    @forelse($data['users'] as $user)
    <p>{{$user['name']}}</p>
    @empty
    <p>Нет данных</p>
    @endforelse

    @forelse($data['users2'] as $user)
    <p>$user['name']</p>
    @empty
    <p>Нет данных</p>
    @endforelse

    @elseif($id == 12)
    <p>
        {{ $text }}
    </p>
    <ul>
        @foreach($data['arr'] as $name1)
        <li>
            {{$loop->index}}
            {{$name1}}
        </li>
        @endforeach
    </ul>

    @elseif($id == 13)
    <p>
        {{ $text }}
    </p>
    <ul>
        @foreach($data['arr'] as $name1)
        <li>
            {{$loop->iteration}}
            {{$name1}}
        </li>
        @endforeach
    </ul>

    @elseif($id == 14)
    <p>
        {{ $text }}
    </p>
    <ul>
        @foreach($data['arr'] as $name1)

        <li
            @if($loop->first)
            class='first'
            @endif
            @if($loop->last)
            class='last'
            @endif
            >

            {{$loop->iteration}}
            {{$name1}}
        </li>
        @endforeach
    </ul>

    @elseif($id == 15)
    <p>
        {{ $text }}
    </p>
    @foreach($data['arr'] as $elem)

    @if($loop->remaining >= 3)
    <b>{{ $elem }}</b>
    @else
    <i>{{ $elem }}</i>
    @endif

    @endforeach

    @elseif($id == 16)
    <p>
        {{ $text }}
    </p>
    @foreach($data['arr'] as $elem)
    @break($elem == 0)
    {{ $elem }}
    @endforeach

    @elseif($id == 17)
    <p>
        {{ $text }}
    </p>
    @foreach($data['arr'] as $elem)
    @continue($elem == 0)
    {{ $elem }}
    @endforeach

    @elseif($id == 18)
    <p>
        {{ $text }}
    </p>
    @for ($i = 1; $i <= 10; $i++)
        <p>{{$i}}</p>
        @endfor

        @endif
        <a href="/blade/foreach-directive">Назад</a>


</x-layout>
