<x-layout>
    <x-slot:title>
        blade - выполение произвольного кода
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &#123;&#123; date('d.m.y') }}
            </pre>
        {{ date('d.m.y') }}
    @endif
    <br />
    <a href="/blade/fundamentals#arbitrary-code">Назад</a>
</x-layout>
