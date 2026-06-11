<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
        </div>
    @endif
    <a href="/migrations/running">Назад</a>

</x-layout>
