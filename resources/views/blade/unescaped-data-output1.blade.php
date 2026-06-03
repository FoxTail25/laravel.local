<x-layout>
    <x-slot:title>
        blade - вывод неэкранированных данных
    </x-slot:title>
    <h2>
        Вывод неэкранированных данных в Blade в Laravel
    </h2>
    <div>
        <!-- We must ship. - Taylor Otwell -->
    </div>
    <div>
        {{ $text }}
    </div>
    <div>
        {!! $data !!}
    </div>
    <a href="/blade/unescaped-data-output">Назад</a>

</x-layout>
