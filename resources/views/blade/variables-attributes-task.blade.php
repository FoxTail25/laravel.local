<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if($id == 1)
    <div>
        <p>
            {{$text}}
        </p>
        <p class="{{$data['class']}}">some text</p>
    </div>

    @elseif($id == 2)
    <div>
        <p>
            {{$text}}
        </p>
        <input value="{{$data['var1']}}" />
        <input value="{{$data['var2']}}" />
        <input value="{{$data['var3']}}" />
    </div>

    @elseif($id == 3)
    <div>
        <p>
            {{$text}}
        </p>
        <p style={{$data['codeText']}}>
            {{ $data['codeText'] }}
        </p>
    </div>

    @elseif($id == 4)
    <div>
        <p>
            {{$text}}
        </p>
        <a href={{ $data['href'] }}>{{$data['text']}}</a>
    </div>


    @endif
    <a href="/blade/variables-attributes">Назад</a>

</x-layout>
