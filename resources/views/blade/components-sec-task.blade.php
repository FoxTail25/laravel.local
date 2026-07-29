<x-layout-second>
    <x-slot:title>
        Компоненты Blade в Laravel
    </x-slot:title>

    <h2>
        Компоненты Blade в Laravel
    </h2>

    @if ($id == 15)
        <p>
            {{ $text }}
        </p>
        <h4>Это дополнительный layout</h4>
        Я сделал дополнительный layout таким же как и основной. Только в дополнительном убрал footer
        <br />
        <a href="/blade/components-task/14">основной layout</a>
        <br />
        <a href="/blade/components#components_task7">Назад</a>
    @endif
</x-layout-second>
