<x-layout>
    <x-slot:title>
        blade - условия
    </x-slot:title>

    <div>
        {{ $text }}
    </div>
    <div>
        @if($data['auth'])
        вам есть 18
        @endif
    </div>

    <a href="/blade/conditions">Назад</a>

</x-layout>
