<x-layout>
    <x-slot:title>
        blade - условия
    </x-slot:title>

    <div>
        {{ $text }}
    </div>
    <div>
        @if(count($data['arr'])>0)
        {{ array_sum($data['arr']) }}
        @endif
    </div>

    <a href="/blade/conditions">Назад</a>

</x-layout>
