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
    @endif
</x-layout>
