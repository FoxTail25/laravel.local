<x-layout>
    <x-slot:title>
        Создание и подключение моделей в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>php atrisan make:model City</pre>
        <a href="/eloquent/create-and-use#task1">Назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>php atrisan make:model User</pre>
        <a href="/eloquent/create-and-use#task1">Назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>use App\Models\User;</pre>
        <a href="/eloquent/create-and-use#task2">Назад</a>
    @endif
</x-layout>
