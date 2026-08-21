<x-layout>
    <x-slot:title>
        Form в Laravel
    </x-slot:title>

    <h3>
        Form в Laravel
    </h3>
    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        <pre>// Controller code:
    'data' => fn() => $request->path()

// Blade code:
    результат метода path: &#123;&#123; $data }}</pre>
        результат метода path: {{ $data }}
        <br />
        <br />
        <a href="{{ route('form-object-request-method') }}#task1">назад</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
        <pre>// Controller code:
    'data' => fn() => $request->url()

// Blade code:
    результат метода url: &#123;&#123; $data }}</pre>
        <br />
        результат метода url: {{ $data }}
        <br />
        <br />
        <a href="{{ route('form-object-request-method') }}#task1">назад</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />
        <pre>// Controller code:
    'data' => fn() => $request->fullUrl()

// Blade code:
    результат метода fullUrl: &#123;&#123; $data }}</pre>
        <br />
        результат метода fullUrl: {{ $data }}
        <br />
        <br />
        <a href="{{ route('form-object-request-method') }}#task1">назад</a>
    @endif
</x-layout>
