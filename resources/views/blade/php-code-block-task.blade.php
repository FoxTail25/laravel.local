<x-layout>
    <x-slot:title>
        Блок PHP кода в Blade
    </x-slot:title>
    <div>
        {{ $text }}
    </div>
    <div>
        @php
        echo "Hello World";
        @endphp
    </div>
    <a href="/blade/php-code-block">Назад</a>
</x-layout>
