<x-layout>
    <x-slot:title>
        blade - выполение произвольного кода
    </x-slot:title>

    @if($id == 1)
    <div>
        <p>
            {{$text}}
        </p>
        {{ date('d.m.y') }}
    </div>

    @endif
    <a href="/blade/arrays">Назад</a>
</x-layout>
