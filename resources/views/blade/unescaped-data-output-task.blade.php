<x-layout>
    <x-slot:title>
        blade - вывод неэкранированных данных
    </x-slot:title>
    <h2>
        Вывод неэкранированных данных в Blade в Laravel
    </h2>
    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &#123;!! $data !!}</pre>
        {!! $data !!}
    @endif
    <br />
    <a href="/blade/fundamentals#unescaped-data-output">Назад</a>

</x-layout>
