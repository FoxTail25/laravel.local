<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>
    <p>
        {{ $text }}
    </p>

    <div>
        день: {{ $data['day'] ?? date('d') }}
    </div>
    <div>
        Месяц: {{ $data['month'] ?? date('m') }}
    </div>
    <div>
        год: {{ $data['year'] ?? date('Y') }}
    </div>


    <a href="/blade/variables-checking">Назад</a>
</x-layout>
