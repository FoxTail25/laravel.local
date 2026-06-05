<x-layout>
    <x-slot:title>
        Блок PHP кода в Blade
    </x-slot:title>
    <h2>
        Блок PHP кода в Blade в Laravel
    </h2>
    <div>
        В некоторых случаях бывает полезно встроить PHP код в представления. Вы можете использовать Blade директиву @php для выполнения блока чистого PHP в вашем шаблоне:
        <pre>
            &#64;php
            // some code
            &#64;endphp
        </pre>
        Давайте выполним какой-нибудь код:
        <pre>
            &#64;php
            echo "Hello World!";
            &#64;endphp
        </pre>
        <a href="/blade/php-code-block-task/1">Задача 1</a>
    </div>
</x-layout>
