<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>

    @if ($id == 1)
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
    @elseif($id == 2)
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
    @elseif($id == 3)
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
    @endif
    <a href="/blade/fundamentals#variables-checking">
        Назад
    </a>

</x-layout>
