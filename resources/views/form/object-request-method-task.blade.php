<x-layout>
    <x-slot:title>
        Form в Laravel
    </x-slot:title>

    <h2>
        Form в Laravel
    </h2>
    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => fn() => $request->path()

        // Blade code:
        результат метода path: &#123;&#123; $data }}
        </pre>
        результат метода path: {{ $data }}
        <br />
        <a href="/form/object-request-method#task1">назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => fn() => $request->url()

        // Blade code:
        результат метода url: &#123;&#123; $data }}
        </pre>
        результат метода url: {{ $data }}
        <br />
        <a href="/form/object-request-method#task1">назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        'data' => fn() => $request->fullUrl()

        // Blade code:
        результат метода fullUrl: &#123;&#123; $data }}
        </pre>
        результат метода fullUrl: {{ $data }}
        <br />
        <a href="/form/object-request-method#task1">назад</a>
    @endif
</x-layout>
