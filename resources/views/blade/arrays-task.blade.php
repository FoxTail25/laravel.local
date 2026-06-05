<x-layout>
    <x-slot:title>
        blade - работа с массивами
    </x-slot:title>

    @if($id == 1)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            <p>{{$data['employee']['name']}}</p>
            <p>{{$data['employee']['age']}}</p>
            <p>{{$data['employee']['salary']}}</p>
        </div>
    </div>

    @elseif($id == 2)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            {{ count($data['employee'])}}
        </div>
    </div>


    @endif
    <a href="/blade/arrays">Назад</a>
</x-layout>
