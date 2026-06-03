<x-layout>
    <x-slot:title>
        blade - условия
    </x-slot:title>

    <div>
        {{ $text }}
    </div>
    <div>
        @if($data['age']>18)
        вам больше 18
        @elseif($data['age'] === 18)
        вам 18
        @else
        вам меньше 18
        @endif
    </div>

    <a href="/blade/conditions">Назад</a>

</x-layout>
