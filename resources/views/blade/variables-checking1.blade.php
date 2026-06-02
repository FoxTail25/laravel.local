<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>
    <p>
        {{ $text }}
    </p>

    <div>
        {{ $data['city'] ?? $data['city'] }}
    </div>
    <div>
        {{ $data['city2'] ?? 'Москва' }}
    </div>
    <a href="/blade/variables-checking">Назад</a>
</x-layout>
