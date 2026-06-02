<x-layout>
    <x-slot:title>
        lesson blade3
    </x-slot:title>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <p>
        Пусть из действия в представление передаются данные работника в виде массива. Пусть в массиве будет ключ name, ключ age и ключ salary. Выведите каждый элемент массива в отдельном абзаце.
    </p>
    <p>
        Имя: {{$employee['name']}}
    </p>
    <p>
        Возраст: {{$employee['age']}}
    </p>
    <p>
        Зарплата: {{$employee['salary']}}
    </p>

</x-layout>
