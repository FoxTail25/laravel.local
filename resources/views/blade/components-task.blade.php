<x-layout>
    <x-slot:title>
        Компоненты Blade в Laravel
    </x-slot:title>

    <h2>
        Компоненты Blade в Laravel
    </h2>
    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <p>
            заходми в каталог resources/views/components/ и размещаем там файл header.blade.php Внутри файла помещаем
            вот такую разметку:
        </p>
        <pre>
    &lt;header>
      header
    &lt;/header></pre>
        Теперь в файле layout.blade.php Вместо
        <pre>
    &lt;header>
      header
    &lt;/header></pre>
        пишем:
        <pre>&lt;x-header/></pre>
        <a href="/blade/components#components_task1">Назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        если компонент распологается в файле: resources/views/components/footer/info.blade.php
        <br>
        то тег будет:
        <pre>&lt;x-footer.info/></pre>
        <a href="/blade/components#components_task2">Назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        если компонент распологается в файле: resources/views/components/main/menu.blade.php
        <br>
        то тег будет:
        <pre>&lt;x-main.menu/></pre>
        <a href="/blade/components#components_task2">Назад</a>
    @elseif ($id == 4)
        <p>
            {{ $text }}
        </p>
        если компонент распологается в файле: resources/views/components/info-block.blade.php
        <br>
        то тег будет:
        <pre>&lt;x-info-block/></pre>
        <a href="/blade/components#components_task3">Назад</a>
    @elseif ($id == 5)
        <p>
            {{ $text }}
        </p>
        если компонент распологается в файле: resources/views/components/sidebar/info-block.blade.php
        <br>
        то тег будет:
        <pre>&lt;x-sidebar.info-block/></pre>
        <a href="/blade/components#components_task3">Назад</a>
    @elseif ($id == 6)
        <p>
            {{ $text }}
        </p>
        если компонент распологается в файле: resources/views/components/sidebar/left/info-block.blade.php
        <br>
        то тег будет:
        <pre>&lt;x-sidebar.left.info-block/></pre>
        <a href="/blade/components#components_task3">Назад</a>
    @elseif ($id == 7)
        <p>
            {{ $text }}
        </p>
        если компонент header распологается в файле: <b>resources/views/components/header.blade.php</b>, а компонет logo
        распологается в файле: <b>resources/views/components/logo.blade.php</b>
        <br>
        то внутри компонента header будет:
        <pre>
    &lt;header>
      &lt;x-logo/>
    &lt;header/></pre>
        <a href="/blade/components#components_task4">Назад</a>
    @elseif ($id == 8)
        <p>
            {{ $text }}
        </p>
        если компонент header распологается в файле: <b>resources/views/components/header.blade.php</b>, а компонет info
        распологается в файле: <b>resources/views/components/info.blade.php</b>
        <br>
        то внутри компонента header будет:
        <pre>
    &lt;header>
      &lt;x-info/>
    &lt;header/></pre>
        <a href="/blade/components#components_task4">Назад</a>
    @elseif ($id == 9)
        <p>
            {{ $text }}
        </p>

        <br>
        Так 'some text' будет передан в компонет info:
        <pre>
    &lt;x-info>
      'some text'
    &lt;/x-info></pre>
        внутри компонента &lt;x-info/> 'some text' попадёт в переменную:
        <pre>&#123;&#123; $slot}}</pre>
        <a href="/blade/components#components_task5">Назад</a>
    @elseif ($id == 10)
        <p>
            {{ $text }}
        </p>

        <br>
        Так $path будет передан в компонет logo:
        <pre>
    &lt;x-logo>
      $path
    &lt;/x-logo></pre>
        внутри компонента &lt;x-logo/>:
        <pre>&lt;img src="&#123;&#123; $slot }}"/></pre>
        <a href="/blade/components#components_task5">Назад</a>
    @elseif ($id == 11)
        <p>
            {{ $text }}
        </p>

        <br>
        Данные будут передаваться в компонет logo так:
        <pre>
    &lt;x-logo>
      &lt;x-slot:alt>
        'some text'
      &lt;/x-slot:alt>
      $path
    &lt;/x-logo></pre>
        внутри компонента &lt;x-logo/>:
        <pre>&lt;img src="&#123;&#123; $slot }}" alt="&#123;&#123; $alt }}"/></pre>
        <a href="/blade/components#components_task6">Назад</a>
    @elseif ($id == 12)
        <p>
            {{ $text }}
        </p>

        <br>
        Данные будут передаваться в компонет logo так:
        <pre>
    &lt;x-logo>
      &lt;x-slot:alt>
        'some text'
      &lt;/x-slot:alt>
      &lt;x-slot:title>
        'some title'
      &lt;/x-slot:title>
      $path
    &lt;/x-logo></pre>
        внутри компонента &lt;x-logo/>:
        <pre>&lt;img src="&#123;&#123; $slot }}" alt="&#123;&#123; $alt }}" title="&#123;&#123; $title }}"/></pre>
        <a href="/blade/components#components_task6">Назад</a>
    @endif
</x-layout>
