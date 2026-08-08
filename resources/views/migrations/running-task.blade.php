<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
    @endif
    <a href="{{ route('migration-running') }}#migrations-running-task1">Назад</a>

</x-layout>
