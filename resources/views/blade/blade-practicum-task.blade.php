<x-layout>
    <x-slot:title>
        blade - практика
    </x-slot:title>
    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        @foreach ($data['links'] as $link)
            <a href="{{ $link['href'] }}">{{ $link['text'] }}</a>
        @endforeach
    @elseif($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <ul>
            @foreach ($data['links'] as $link)
                <li>
                    <a href="{{ $link['href'] }}">{{ $link['text'] }}</a>
                </li>
            @endforeach
        </ul>
    @elseif($id == 3)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <table>
            @foreach ($data['employees'] as $employee)
                <tr>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['surname'] }}</td>
                    <td>{{ $employee['salary'] }}</td>
                </tr>
            @endforeach
        </table>
    @elseif($id == 4)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <table>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Зарплата</th>
            </tr>
            @foreach ($data['employees'] as $employee)
                <tr>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['surname'] }}</td>
                    <td>{{ $employee['salary'] }}</td>
                </tr>
            @endforeach
        </table>
    @elseif($id == 5)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <table>
            <tr>
                <th>№пп</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Зарплата</th>
            </tr>
            @foreach ($data['employees'] as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['surname'] }}</td>
                    <td>{{ $employee['salary'] }}</td>
                </tr>
            @endforeach
        </table>
    @elseif($id == 6)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <table>
            <tr>
                <th>№пп</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Зарплата</th>
            </tr>
            @foreach ($data['employees'] as $employee)
                @if ($employee['salary'] > 2000)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee['name'] }}</td>
                        <td>{{ $employee['surname'] }}</td>
                        <td>{{ $employee['salary'] }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    @elseif($id == 7)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <table>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Статус</th>
            </tr>
            @foreach ($data['users'] as $employee)
                <tr>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['surname'] }}</td>
                    <td>
                        @if ($employee['banned'])
                            забанен
                        @else
                            активен
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @elseif($id == 8)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <table>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Статус</th>
            </tr>
            @foreach ($data['users'] as $employee)
                <tr style="@if ($employee['banned']) color:red; @else color:green; @endif">

                    <td style="color: inherit;">{{ $employee['name'] }}</td>
                    <td style="color: inherit;">{{ $employee['surname'] }}</td>
                    <td style="color: inherit;">
                        @if ($employee['banned'])
                            забанен
                        @else
                            активен
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @elseif($id == 9)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        @foreach ($data['str'] as $str)
            <input type="text" value="{{ $str }}">
        @endforeach
    @elseif($id == 10)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <select name="string">

            @foreach ($data['str'] as $str)
                <option value="{{ $str }}">
                    {{ $str }}
                </option>
            @endforeach
        </select>
    @elseif($id == 11)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
        <ul>
            @foreach ($data['arrMonthDay'] as $monthDay)
                <li @if ($monthDay == $data['dayNow']) class="active" @endif>
                    {{ $monthDay }}
                </li>
            @endforeach
        </ul>
    @endif
    <br />
    <a href="/blade/blade-practicum">
        Назад</a>
</x-layout>
