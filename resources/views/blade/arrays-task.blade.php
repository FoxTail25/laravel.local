<x-layout>
    <x-slot:title>
        blade - работа с массивами
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &lt;p>&#123;&#123;$data['employee']['name']}}&lt;/p>
    &lt;p>&#123;&#123;$data['employee']['age']}}&lt;/p>
    &lt;p>&#123;&#123;$data['employee']['salary']}}&lt;/p></pre>
        <p>{{ $data['employee']['name'] }}</p>
        <p>{{ $data['employee']['age'] }}</p>
        <p>{{ $data['employee']['salary'] }}</p>
    @elseif($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
    // Blade code:
    &#123;&#123; count($data['employee'])}}</pre>
            {{ count($data['employee']) }}
        </div>
    @endif
    <a href="/blade/fundamentals#arrays">Назад</a>
</x-layout>
