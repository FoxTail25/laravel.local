<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if($id == 1)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            {{ $data['city'] ?? $data['city'] }}
        </div>
        <div>
            {{ $data['city2'] ?? 'Москва' }}
        </div>
    </div>

    @elseif($id == 2)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            {{ $data['location']['country'] ? $data['location']['country'] : "Россия" }}
        </div>
        <div>
            {{ $data['location']['city'] ? $data['location']['city'] : "Москва" }}
        </div>
    </div>

    @elseif($id == 3)
    <div>
        <p>
            {{$text}}
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
    </div>


    @endif
    <a href="/blade/variables-checking">Назад</a>

</x-layout>
