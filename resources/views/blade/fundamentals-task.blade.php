<x-layout>
    <x-slot:title>
        Основы Blade в Laravel
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
            <a href="{{ route('fundamentals') }}#fundamentals_task1">Назад</a>
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
        <a href="{{ route('fundamentals') }}#fundamentals_task1">Назад</a>
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
        <a href="{{ route('fundamentals') }}#fundamentals_task1">Назад</a>
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
        <a href="{{ route('fundamentals') }}#fundamentals_task1">Назад</a>
    @elseif($id == 5)
        <p>
            {{ $text }}
        </p>

        <pre>
    // Blade code:
    &#123;&#123; date('d.m.y') }}
            </pre>
        {{ date('d.m.y') }}
        <br />
        <a href="{{ route('fundamentals') }}#fundamentals_task3">Назад</a>
    @elseif ($id == 6)
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
        <a href="{{ route('fundamentals') }}#fundamentals_task3">Назад</a>
    @elseif($id == 7)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
    // Blade code:
    &#123;&#123; count($data['employee'])}}</pre>
            {{ count($data['employee']) }}
        </div>
        <a href="{{ route('fundamentals') }}#fundamentals_task3">Назад</a>
    @elseif ($id == 8)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &lt;div>
        &#123;&#123; $data['city'] ?? $data['city'] }}
    &lt;/div>
    &lt;div>
        &#123;&#123; $data['city2'] ?? 'Москва' }}
    &lt;/div>
        </pre>
        <div>
            {{ $data['city'] ?? $data['city'] }}
        </div>
        <div>
            {{ $data['city2'] ?? 'Москва' }}
        </div>
        <a href="{{ route('fundamentals') }}#fundamentals_task4">Назад</a>
    @elseif($id == 9)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &lt;div>
        &#123;&#123; $data['location']['country'] ? $data['location']['country'] : 'Россия' }}
    &lt;/div>
    &lt;div>
        &#123;&#123; $data['location']['city'] ? $data['location']['city'] : 'Москва' }}
    &lt;/div>
        </pre>
        <div>
            {{ $data['location']['country'] ? $data['location']['country'] : 'Россия' }}
        </div>
        <div>
            {{ $data['location']['city'] ? $data['location']['city'] : 'Москва' }}
        </div>
        <a href="{{ route('fundamentals') }}#fundamentals_task4">Назад</a>
    @elseif($id == 10)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &lt;div>
        день: &#123;&#123; $data['day'] ?? date('d') }}
    &lt;/div>
    &lt;div>
        Месяц: &#123;&#123; $data['month'] ?? date('m') }}
    &lt;/div>
    &lt;div>
        год: &#123;&#123; $data['year'] ?? date('Y') }}
    &lt;/div>
        </pre>
        <div>
            день: {{ $data['day'] ?? date('d') }}
        </div>
        <div>
            Месяц: {{ $data['month'] ?? date('m') }}
        </div>
        <div>
            год: {{ $data['year'] ?? date('Y') }}
        </div>
        <a href="{{ route('fundamentals') }}#fundamentals_task4">Назад</a>
    @elseif ($id == 11)
        <p>
            {{ $text }}
        </p>
        <pre>
    // Blade code:
    &#123;!! $data !!}</pre>
        {!! $data !!}
        <a href="{{ route('fundamentals') }}#fundamentals_task5">Назад</a>
    @endif
</x-layout>
