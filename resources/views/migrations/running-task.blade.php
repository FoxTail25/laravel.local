<x-layout>
    <x-slot:title>
        migration - задача
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
    @endif
    <a href="{{ route('migration-running') }}#migrations-running-task1">Назад к задачам</a>

</x-layout>
