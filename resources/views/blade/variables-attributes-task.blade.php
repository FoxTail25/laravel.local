<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
    // blade code:
    &lt;p class="{{ $data['class'] }}">some text&lt;/p></pre>
            <p class="{{ $data['class'] }}">some text</p>
        </div>
    @elseif($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
    // blade code:
    &lt;input value="&#123;&#123; $data['var1'] }}" />
    &lt;input value="&#123;&#123; $data['var2'] }}" />
    &lt;input value="&#123;&#123; $data['var3'] }}" /></pre>
            <input value="{{ $data['var1'] }}" />
            <input value="{{ $data['var2'] }}" />
            <input value="{{ $data['var3'] }}" />
        </div>
    @elseif($id == 3)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
    // blade code:
    &lt;p style="&#123;&#123; $data['myCssRules'] }}">
        &#123;&#123; $data['myCssRules'] }}
    &lt;/p></pre>
            <p style="{{ $data['myCssRules'] }}">
                {{ $data['myCssRules'] }}
            </p>
        </div>
    @elseif($id == 4)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
    // blade code:
    &lt;a href="&#123;&#123; $data['href'] }}">
        &#123;&#123; $data['text'] }}
    &lt;/a></pre>
            <a href="{{ $data['href'] }}">{{ $data['text'] }}</a>
        </div>
    @endif
    <a href="/blade/fundamentals#variable-attributes">Назад</a>

</x-layout>
