<x-layout>
    <x-slot:title>
        blade - вывод неэкранированных данных
    </x-slot:title>
    <h2>
        Вывод неэкранированных данных в Blade в Laravel
    </h2>
    @if($id == 1)
    <div>
        <p>
            {{ $text }}
        </p>
        <div>
            {!! $data !!}
        </div>
    </div>

    @endif
    <a href="/blade/unescaped-data-output">Назад</a>

</x-layout>
