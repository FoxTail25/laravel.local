<x-layout>
    <x-slot:title>
        blade - вывод неэкранированных данных
    </x-slot:title>
    <h2>
        Вывод неэкранированных данных в Blade в Laravel
    </h2>
    <div>
        <!-- We must ship. - Taylor Otwell -->
    </div>
    <div>
        По умолчанию оператор &#123;&#123; &#125;&#125; автоматически обрабатывает данные через функцию htmlentities для предотвращения XSS-атак. Если вы не хотите экранировать данные, используйте такой синтаксис:
        <pre>
            Hello, &#123;!! $name !!&#125;
        </pre>
    </div>
    <a href="/blade/unescaped-data-output-task/1">Задача 1</a>

</x-layout>
