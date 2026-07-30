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
    @elseif ($id == 13)
        <p>
            {{ $text }}
        </p>

        <br>
        Создаём файл resources/views/components/meta.blade.php
        И добавляем в него следующее содержимое:
        <pre>
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Основное SEO -->
    &lt;meta name="description"
        content="Мой личный конспект по фреймворку Laravel.
        Пошаговые заметки, разбор архитектуры,
        Eloquent ORM, маршрутизации
         и практические примеры кода.">
    &lt;meta name="author" content="FoxTail25"></pre>
        Теперь подключаем файл с мета данными в layout. Добавляем тег &lt;x-meta/> в раздел head в файле
        resources/views/components/layout.blade.php
        <a href="/blade/components#components_task7">Назад</a>
    @elseif ($id == 14)
        <p>
            {{ $text }}
        </p>
        <h4>Это основной layout</h4>
        Я сделал дополнительный layout таким же как и основной. Только в дополнительном убрал footer
        <br />
        <a href="/blade/components-task/15">дополнительный layout</a>
        <br />
        <a href="/blade/components#components_task7">Назад</a>
        {{-- 15я задача в другом layout --}}
    @elseif ($id == 16)
        <p>
            {{ $text }}
        </p>
        <pre>
//file: app/View/Components/Footer.php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{
    public function render()
    {
        return view('components.footer');
    }
}</pre>
        <a href="/blade/components#components_task8">Назад</a>
    @elseif ($id == 17)
        <p>
            {{ $text }}
        </p>
        1) Создаём файл в котором хранится класс управляющий компонентом:
        <pre>//filepath: app/View/Components/education/User.php

&lt;?php
// !!! Очень внимательно относимся к namespace !!!
namespace App\View\Components\education;

use Illuminate\View\Component;

class User extends Component
{
    public function render()
    {
        return view('components.education.user', [
            'firstName' => 'Smit',
            'secondName' => 'John',
            'age' => '42',
        ]);
    }
}</pre>
        2) Создаём blade представления user:
        <pre>//filepath: resources/views/components/education/user.blade.php

&lt;div>
    User
    &lt;p>
    Firstname: &#123;&#123; $firstName }}
    &lt;p />
    &lt;p>
    Secondname: &#123;&#123; $secondName }}
    &lt;p />
    &lt;p>
    Age: &#123;&#123; $age }}
    &lt;p />
&lt;/div>
}</pre>
        3) Подключаем компонент:
        <pre>&lt;x-education.User /></pre>
        4) В результате получаем:
        <x-education.User />
        <a href="/blade/components#components_task9">Назад</a>
    @elseif ($id == 18)
        <p>
            {{ $text }}
        </p>
        1) Создаём файл в котором хранится класс управляющий компонентом:
        <pre>//filepath: app/View/Components/education/Info.php

&lt;?php
// !!! Очень внимательно относимся к namespace !!!
namespace App\View\Components\education;

use Illuminate\View\Component;

class Info extends Component
{
    public function render()
    {
        return view('components.education.info', [
            'strArr' =>
            [
                'some str0',
                'some str1',
                'some str2',
            ]
        ]);
    }
}</pre>
        2) Создаём blade представления user:
        <pre>//filepath: resources/views/components/education/info.blade.php

&lt;div>
    &lt;ul>
        &#64;foreach ($strArr as $str)
            &lt;li>&#123;&#123; $str }}&lt;/li>
        &#64;endforeach
    &lt;/ul>
&lt;/div>
}</pre>
        3) Подключаем компонент:
        <pre>&lt;x-education.User /></pre>
        4) В результате получаем:
        <x-education.Info />
        <a href="/blade/components#components_task9">Назад</a>
    @elseif ($id == 19)
        <p>
            {{ $text }}
        </p>
        1) Создаём файл в котором хранится класс управляющий компонентом:
        <pre>//filepath: app/View/Components/education/FivaPosts.php

&lt;?php
// !!! Очень внимательно относимся к namespace !!!
namespace App\View\Components\education;

use App\Models\Post; //подключаем модель!
use Illuminate\View\Component;

class FivePosts extends Component
{
    public function render()
    {
        $posts = Post::take(5)->orderBy('likes')->get();
        return view('components.education.fiveposts', ['posts' => $posts]);
    }
}</pre>
        2) Создаём blade представления user:
        <pre>//filepath: resources/views/components/education/fiveposts.blade.php

&lt;ul>
    &#64;foreach ($posts as $post)
        &lt;li>
                &lt;a href="/education-task/post/&#123;&#123; $post->id }}">
            &#123;&#123; $post->title }}
        &lt;/li>
    &#64;endforeach
&lt;/ul>
}</pre>
        3) Подключаем компонент:
        <pre>&lt;x-education.fiveposts /></pre>
        4) В результате получаем:
        <x-education.fiveposts />
        <span id="task19"></span>
        5) Что бы эти ссылки были рабочими, необходимо внести изменения в роутер и в контроллер который будет
        обробатывать данный роут. А так же создать предстваление для отображения данных!
        <a href="/blade/components#components_task10">Назад</a>
    @elseif ($id == 20)
        <p>
            {{ $text }}
        </p>
        <pre>
            php artisan make:component Menu</pre>

        <a href="/blade/components#components_task11">Назад</a>
    @elseif ($id == 21)
        <p>
            {{ $text }}
        </p>
        <pre>
            php artisan make:component Nav --view</pre>

        <a href="/blade/components#components_task11">Назад</a>
    @elseif ($id == 22)
        <p>
            {{ $text }}
        </p>
        1) Создаём компонент Logo (управляющий класс и предствление)
        <pre>php artisan make:component education/Logo</pre>
        2) Пишем код в управляющем классе:
        <pre>//filepath: App/View/Components/education/Logo.php
&lt;?php

namespace App\View\Components\education;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
    public string $path;
    public string $alt;

    public function __construct(string $path, string $alt)
    {
        $this->path = $path;
        $this->alt = $alt;
    }

    public function render(): View|Closure|string
    {
        return view('components.education.logo', ['path' => $this->path, 'alt' => $this->alt]);
    }
}</pre>
        2) Пишем код в предствлении:
        <pre>
&lt;div>
    &lt;img src="&#123;&#123; $path }}" alt="&#123;&#123; $alt }}" width="75"/>
&lt;/div>
</pre>
        3) Подключаем компонет и передаём в него данные:
        <pre>&lt;x-education.logo path="/img/smile.png" alt="Улыбка" width="100"/></pre>
        Результат: <x-education.logo path="/img/smile.png" alt="Улыбка" />

        <a href="/blade/components#components_task12">Назад</a>
    @elseif ($id == 23)
        <p>
            {{ $text }}
        </p>
        На самом деле, это задачка "со звёздочкой(*)))". Ведь у нас уже есть компонет Logo в котором мы в прошлой задаче
        захардокодили атрибут width="75"! Если мы сейчас его перепишем, то он перестанет корректно работать в
        предыдушей задаче...
        <br />
        На самом деле, решение лежит на поверхности. Нам просто нужно дописать проверку на наличии свойства width в
        массиве $attributes
        <br />
        Исправляем компонет Logo:
        <pre>
&lt;div>
    &lt;img
        src="&#123;&#123; $path }}"
        alt="&#123;&#123; $alt }}"
        &#123;&#123; is_null($attributes['width']) ? 'width=75' : $attributes }} />
&lt;/div>
</pre>
        3) Подключаем компонет и передаём в него данные:
        <pre>&lt;x-education.logo path="/img/smile.png" alt="Улыбка" width="100"/></pre>
        Результат: <x-education.logo path="/img/smile.png" alt="Улыбка" width="100" />

        <a href="/blade/components#components_task13">Назад</a>
    @endif
</x-layout>
