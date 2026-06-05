<x-layout>
    <x-slot:title>
        blade - проверка переменных
    </x-slot:title>
    <h2>Проверка переменных в Blade в Laravel</h2>
    <p>
        Можно выполнять проверку переменных через тернарный оператор:
    <pre>
    &#123;&#123; $var ? 'eee' : 'bbb' &#125;&#125;
    </pre>
    </p>
    <p>
        Можно также выполнять проверку переменных через оператор объединения с null:
    <pre>
    &#123;&#123; $var ?? 'eee' &#125;&#125;
    </pre>
    </p>
    <p>
        В результате проверки можно выполнять произвольный код:
    <pre>
    &#123;&#123; $year ?? date('Y') &#125;&#125;
    </pre>
    </p>
    <a href="/blade/variables-checking-task/1">задача 1</a>
    <a href="/blade/variables-checking-task/2">задача 2</a>
    <a href="/blade/variables-checking-task/3">задача 3</a>
</x-layout>
