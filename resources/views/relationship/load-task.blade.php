<x-layout>
    <x-slot:title>
        Ленивая и жадная загрузки в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        $professions = Profession::with(['employees'])->get();
        return $professions;

        // Blade code:
        &#64;foreach ($data as $profession)
            &lt;h5>Профессия: &#123;&#123; $profession->name }}&lt;/h5>
            список тех, кто ею владеет:
            &lt;ul>
                &#64;foreach ($profession->employees as $employee)
                    &lt;li>
                        &#123;&#123; $employee->name }}
                    &lt;/li>
                &#64;endforeach
            &lt;/ul>
        &#64;endforeach

        </pre>
        @foreach ($data as $profession)
            <h5>Профессия: {{ $profession->name }}</h5>
            список тех, кто ею владеет:
            <ul>
                @foreach ($profession->employees as $employee)
                    <li>
                        {{ $employee->name }}
                    </li>
                @endforeach
            </ul>
        @endforeach
        <a href="/relationship/load#task1">назад</a>
    @elseif($id == 2)
        <p>
            {{ $text }}
        </p>
        У нас сформировался очень похожий пример! Таблица employees, котороя соединена связью "многие к одному" с
        таблицами cities и positions. А так же
        связью "многие ко многим" с professions. Попробуем на этом примере решить предложенную задачу:
        <pre>
        // Controller code:
        $employees = Employee::with(['city', 'position', 'professions'])->get();
        return $employees;

        // Blade code:
        &#64;foreach ($data as $employee)
            Сотрудник &#123;&#123; $employee->name }} из города &#123;&#123; $employee->city->name }}
            &lt;br />
            Владеет следующими профессиями:
            &lt;ul>
                &#64;foreach ($employee->professions as $profession)
                    &lt;li>&#123;&#123; $profession->name }}&lt;/li>
                &#64;endforeach
            &lt;/ul>
        &#64;endforeach
        </pre>
        @foreach ($data as $employee)
            Сотрудник {{ $employee->name }} из города {{ $employee->city->name }}
            <br />
            Владеет следующими профессиями:
            <ul>
                @foreach ($employee->professions as $profession)
                    <li>{{ $profession->name }}</li>
                @endforeach
            </ul>
        @endforeach
        <a href="/relationship/load#task2">назад</a>
    @endif
</x-layout>
