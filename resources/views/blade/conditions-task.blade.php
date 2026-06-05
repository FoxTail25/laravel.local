<x-layout>
    <x-slot:title>
        blade - условия
    </x-slot:title>
    @if($id == 1)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            @if($data['auth'])
            вам есть 18
            @endif
        </div>
    </div>

    @elseif($id == 2)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            @if($data['auth'])
            вам есть 18
            @else
            вам нет 18
            @endif
        </div>
    </div>

    @elseif($id == 3)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            @if($data['age']>18)
            вам больше 18
            @elseif($data['age'] === 18)
            вам 18
            @else
            вам меньше 18
            @endif
        </div>
    </div>

    @elseif($id == 4)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            @unless($data['age']>18)
            Вход только для тех кому 18 и более лет
            @endunless
        </div>
    </div>

    @elseif($id == 5)
    <div>
        <p>
            {{$text}}
        </p>
        <div>
            @if(count($data['arr'])>0)
            {{ array_sum($data['arr']) }}
            @endif
        </div>
    </div>


    @endif
    <a href="/blade/conditions">Назад</a>

</x-layout>
