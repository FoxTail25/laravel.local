<x-layout>
    <x-slot:title>
        Создание и подключение моделей в Laravel
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        <pre>php atrisan make:model City</pre>
        <br />
        <br />
        <a href="{{ route('create-and-use') }}#task1">Назад</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        <pre>php atrisan make:model User</pre>
        <br />
        <br />
        <a href="{{ route('create-and-use') }}#task1">Назад</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />
        <pre>use App\Models\User;</pre>
        <br />
        <br />
        <a href="{{ route('create-and-use') }}#task2">Назад</a>
    @endif
</x-layout>
