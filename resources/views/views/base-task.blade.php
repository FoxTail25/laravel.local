<x-layout>
    <x-slot:title>
        Представления в Laravel
    </x-slot:title>
    <h2>
        Задачи на Views (Представления) в Laravel
    </h2>
    <hr />
    @if ($id == 1)
        <x-page.tasks.header :text="$text" />

        <br />
        <br />

        <a href="{{ route('views-base') }}#controllers_task1">Назад к задачам</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />

        <br />
        <br />

        <a href="{{ route('views-base') }}#controllers_task2">Назад к задачам</a>
    @endif
</x-layout>
