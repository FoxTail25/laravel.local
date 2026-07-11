<x-layout>
    <x-slot:title>
        blade - условия
    </x-slot:title>
    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &#64;if ($data['auth'])
        вам есть 18
    &#64;endif
        </pre>
        @if ($data['auth'])
            вам есть 18
        @endif
        <br>
        <a href="/blade/conditions#condition-task1">
            Назад
        </a>
    @elseif($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &#64;if ($data['auth'])
        вам есть 18
    &#64;else
        вам нет 18
    &#64;endif</pre>
        @if ($data['auth'])
            вам есть 18
        @else
            вам нет 18
        @endif
        <br />
        <a href="/blade/conditions#condition-task2">
            Назад
        </a>
    @elseif($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &#64;if ($data['age'] > 18)
        вам больше 18
    &#64;elseif($data['age'] === 18)
        вам 18
    &#64;else
        вам меньше 18
    &#64;endif</pre>
        <div>
            @if ($data['age'] > 18)
                вам больше 18
            @elseif($data['age'] === 18)
                вам 18
            @else
                вам меньше 18
            @endif
        </div>
        <a href="/blade/conditions#condition-task3">
            Назад
        </a>
    @elseif($id == 4)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &#64;unless ($data['age'] > 18)
        Вход только для тех кому 18 и более лет
    &#64;endunless</pre>
        <div>
            @unless ($data['age'] > 18)
                Вход только для тех кому 18 и более лет
            @endunless
        </div>
        <a href="/blade/conditions#condition-task4">
            Назад
        </a>
    @elseif($id == 5)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
        </pre>
        <div>
            @if (count($data['arr']) > 0)
                {{ array_sum($data['arr']) }}
            @endif
        </div>
        <a href="/blade/conditions#condition-task5">
            Назад
        </a>
    @endif
</x-layout>
