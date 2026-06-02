<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>
    <p>
        {{ $text }}
    </p>

    <div>
        {{ $data['location']['country'] ? $data['location']['country'] : "Россия" }}
    </div>
    <div>
        {{ $data['location']['city'] ? $data['location']['city'] : "Москва" }}
    </div>

    <a href="/blade/variables-checking">Назад</a>
</x-layout>
