<x-layout>
    <x-slot:title>
        lesson blade3
    </x-slot:title>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <p>
        В фигурных скобках Blade можно не только выводить переменные, но и выполнять произвольный PHP код, например, вызывать стандартные функции:
    </p>
    <p>
        Выведите в представлении текущую дату в формате день.месяц.год.
    </p>
    {{ date('d.m.Y') }}
</x-layout>
