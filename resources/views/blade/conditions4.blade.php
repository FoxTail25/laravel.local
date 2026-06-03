<x-layout>
    <x-slot:title>
        blade - условия
    </x-slot:title>

    <div>
        {{ $text }}
    </div>
    <div>
        @unless($data['age']>18)
        Вход только для тех кому 18 и более лет
        @endunless
    </div>

    <a href="/blade/conditions">Назад</a>

</x-layout>
