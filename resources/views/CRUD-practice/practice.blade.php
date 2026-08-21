<x-layout>
    <x-slot:title>
        Практика на CRUD в Laravel
    </x-slot:title>
    <h3>
        Практика на CRUD в Laravel
    </h3>
    <x-page.content.task.head :data="['tasks', 'Задачи:']" />
    <x-page.content.task.body href='CRUD-practice-task' :tasks="[
        1 => [
            'text' => 'Выведите юзеров в виде HTML таблицы.',
        ],
        2 => [
            'text' => 'На отдельной странице сделайте форму для добавления новых юзеров.',
        ],
    ]" />
    <br />
    <br />

</x-layout>
