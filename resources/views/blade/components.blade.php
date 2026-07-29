<x-layout>
    <x-slot:title>
        Компоненты в Laravel
    </x-slot:title>

    <h2>
        Компоненты в Laravel
    </h2>
    <h4>
        Компоненты в макете сайта в Laravel
    </h4>
    Как правило в макете сайта помимо изменяющегося контента присутствуют и другие блоки, например, такие:
    <pre>
&lt;!DOCTYPE html>
&lt;html>
  &lt;head>
   &lt;title>&#123;&#123; $title }}&lt;/title>
  &lt;/head>
  &lt;body>
    &lt;div class="wrapper">
      &lt;header>
        header
      &lt;/header>
      &lt;main>
        &#123;&#123; $slot }}
      &lt;/main>
      &lt;footer>
        footer
      &lt;/footer>
    &lt;/div>
  &lt;/body>
&lt;/html></pre>
    Laravel позволяет выносить такие блоки в отдельные файлы. Кроме того, для каждого блока можно сделать свой
    контроллер. Это позволит получать содержимое блоков из базы данных и формировать его через шаблонизатор.
    <br />
    Такие блоки в Laravel называются компонентами. Изучением работы с ними мы и займемся в следующих уроках.
    <br />
    <br />
    <h4>
        Вынесение компонентов в файлы в Laravel
    </h4>
    Давайте, к примеру, вынесем блок с хедером в отдельный компонент. Для этого перенесем его код в следующий файл:
    resources/views/components/header.blade.php
    <pre>
&lt;header>
  header
&lt;/header></pre>
    Теперь используем в макете специальную команду для вставки нашего компонента. Эта команда представляет собой
    специальный тег, имя которого начинается с x-, а затем идет имя файла нашего компонента. В нашем случае эта команда
    будет выглядеть так: &lt;x-header />.
    <br />
    Воспользуемся этой командой в макете сайта:
    <pre>
&lt;!DOCTYPE html>
&lt;html>
  &lt;head>
   &lt;title>&#123;&#123; $title }}&lt;/title>
  &lt;/head>
  &lt;body>
    &lt;div class="wrapper">
      &lt;x-header/>
      &lt;main>
        &#123;&#123; $slot }}
      &lt;/main>
      &lt;footer>
        footer
      &lt;/footer>
    &lt;/div>
  &lt;/body>
&lt;/html></pre>
    <x-task.head :data="['components_task1', 'Задача:']" />
    <x-task.body :tasks="['/blade/components-task/1' => 'Вынесите header в отдельный компонет и подключите его к своему layout']" />
    <br />
    <br />
    <h4>
        Размещение компонентов в подпапках в Laravel
    </h4>
    Компоненты можно размещать в подпапках. Пусть для примера у нас есть следующий компонент menu, размещенный в
    файле:
    resources/views/components/header/menu.blade.php
    <pre>
&lt;div class="menu">
	menu
&lt;/div></pre>
    В этом случае он будет подключаться следующим образом:
    <pre>&lt;x-header.menu /></pre>
    <x-task.head :data="['components_task2', 'Задачи:']" />
    <x-task.body :tasks="[
        '/blade/components-task/2' =>
            'Пусть компонент info расположен в папке footer. Напишите тег для подключения этого компонента.',
        '/blade/components-task/3' =>
            'Пусть компонент nav расположен в папке main/menu. Напишите тег для подключения этого компонента.',
    ]" />
    <br />
    <br />
    <h3>
        Имена компонентов из нескольких слов в Laravel
    </h3>
    Имена компонентов могут состоять из нескольких слов. В этом случае эти слова разделяют дефисом.
    Компонент размещенный в файле: resources/views/components/main-menu.blade.php будет подключаться тегом:
    <pre>&lt;x-main-menu/></pre>
    <x-task.head :data="['components_task3', 'Задачи:']" />
    <x-task.body :tasks="[
        '/blade/components-task/4' =>
            'Дан компонент с именем info-block. Напишите тег для подключения этого компонента.',
        '/blade/components-task/5' =>
            'Пусть компонент info-block расположен в папке sidebar. Напишите тег для подключения этого компонента.',
        '/blade/components-task/6' =>
            'Пусть компонент info-block расположен в папке sidebar/left. Напишите тег для подключения этого компонента.',
    ]" />
    <br />
    <br />
    <h3>
        Подключение компонентов к компонентам в Laravel
    </h3>
    <b>Одни компоненты могут подключать другие компоненты!</b>
    <br />
    Пусть к примеру компонент header распологается по адресу: resources/views/components/header
    <br />и у нас есть компонет alert, который расположен по адресу: resources/views/components/alert
    <br />
    Мы можем подключить компонет alert внутри компонента header вот так:
    <pre>
&lt;header>
  header
  &lt;x-alert />
&lt;/header></pre>
    <x-task.head :data="['components_task4', 'Задачи:']" />
    <x-task.body :tasks="[
        '/blade/components-task/7' => 'Подключите внутри хедера компонент с логотипом сайта.',
        '/blade/components-task/8' => 'Подключите внутри хедера компонент с контактными данными.',
    ]" />
    <br />
    <br />
    <h3>
        Слоты компонентов в Laravel
    </h3>
    <b>
        <i>
            (Или передача данных внутрь компонентов)
        </i>
    </b>
    <br />
    Пусть у нас есть некоторый компонент. Давайте подключим его:
    <pre>&lt;x-alert /></pre>
    При необходимости мы можем передать в компонент некоторый текст. Для этого этот текст нужно написать между
    открывающим и закрывающим тегом компонента:
    <pre>
&lt;x-alert>
	text text text
&lt;/x-alert>
    </pre>
    В самом компоненте переданный текст попадет в переменную $slot:
    <pre>
&lt;div class="alert">
	&#123;&#123; $slot }}
&lt;/div>
    </pre>
    <x-task.head :data="['components_task5', 'Задачи:']" />
    <x-task.body :tasks="[
        '/blade/components-task/9' =>
            'Сделайте компонент info для вывода информации. Передайте в него параметром некоторый текст.',
        '/blade/components-task/10' =>
            'Сделайте компонент logo для вывода логотипа. Передайте в него параметром путь к картинке логотипа.',
    ]" />
    <br />
    <br />
    <h3>
        Дополнительные слоты компонентов в Laravel
    </h3>
    В компоненте кроме основного слота, попадающего в переменную $slot, можно задавать еще и дополнительные слоты,
    попадающие в свои переменные.
    <br />
    Это делается с помощью тега &lt;x-slot>, в котором после двоеточия указывается имя слота. Давайте для примера
    сделаем слот с именем type:
    <pre>
&lt;x-alert>
  &lt;x-slot:type>
    error
  &lt;/x-slot>

  text text text
&lt;/x-alert></pre>
    Текст этого слота попадет в переменную $type. Выведем этот текст в представлении компонента:
    <pre>
&lt;div class="alert alert-&#123;&#123; $type }}">
	&#123;&#123; $slot }}
&lt;/div>
    </pre>
    <x-task.head :data="['components_task6', 'Задачи:']" />
    <x-task.body :tasks="[
        '/blade/components-task/11' =>
            'В компоненте logo сделайте дополнительный слот, в который будет передаваться атрибут alt картинки.',
        '/blade/components-task/12' =>
            'В компоненте logo сделайте еще один дополнительный слот, в который будет передаваться атрибут title картинки.',
    ]" />
    <br />
    <br />
    <h3 class="text-danger">
        !!Передача массивов!!
    </h3>
    <b>
        <i>
            Есть ещё один способ передать данные в компонет...
        </i>
    </b>
    <br />
    Иногда бывает удобно передать данные в виде массива.
    Это можно сделать вот так:
    <pre>
    &lt;x-logo :attrs="['path' => 'some path', 'alt' => 'some alt', 'title' => 'some title']"/></pre>
    внутри компонета &lt;x-logo/> это используется так:
    <pre>
&#64;props(['attrs']) // вроде без этого тоже работает ))
&lt;img src="$attrs['path']" alt="$attrs['alt']" title="$attrs['title']"/></pre>
    <br />
    <br />
    <h4>
        Макет сайта как компонент в Laravel
    </h4>
    Макет сайта в Laravel сам является компонентом. Он находится в файле resources/views/components/layout.blade.php.
    Давайте
    посмотрим на его код:
    <pre>
&lt;!DOCTYPE html>
&lt;html>
	&lt;head>
		&lt;title>&#123;&#123; $title }}&lt;/title>
	&lt;/head>
	&lt;body>
		&#123;&#123; $slot }}
	&lt;/body>
&lt;/html></pre>
    Как вы видите, контент сайта является основным слотом, а тайтл - дополнительным. Именно так мы и задаем их в
    представлениях:
    file: resources/views/post/show.blade.php
    <pre>
&lt;x-layout>
	&lt;x-slot:title>
		page title
	&lt;/x-slot>

	page content
&lt;/x-layout></pre>
    Технически это означает, что мы можем передавать в макет и другие дополнительные слоты, а также для разных
    представлений использовать различные макеты сайта.
    <x-task.head :data="['components_task7', 'Задачи:']" />
    <x-task.body :tasks="[
        '/blade/components-task/13' =>
            'Сделайте в макете дополнительный слот, в котором будет задаваться мета описание страницы.',
        '/blade/components-task/14' =>
            'Сделайте два отличающихся макета сайта. Для одного представления используйте первый макет, а для другого - второй.',
    ]" />
    <br />
    <br />
    <h3>
        Класс компонента в Laravel
    </h3>
    Для компонента при необходимости можно создавать управляющий им PHP класс. Эти классы размещаются в папке
    app/View/Components.
    <br />
    Давайте создадим класс для компонента Header:
    <pre>//file: app/View/Components/Header.php
&lt;?php
	namespace App\View\Components;
	use Illuminate\View\Component;

	class Header extends Component
	{

	}</pre>
    В методе render укажем, что мы хотим рендерить файл представления нашего компонента:
    <pre>//file: app/View/Components/Header.php
&lt;?php
	namespace App\View\Components;
	use Illuminate\View\Component;

	class Header extends Component
	{
		public function render()
		{
			return view('components.header');
		}
	}</pre>
    <x-task.head :data="['components_task8', 'Задача:']" />
    <x-task.body :tasks="[
        '/blade/components-task/16' => 'Сделайте класс для компонента Footer.',
    ]" />
    <br />
    <br />
    <h3>
        Передача данных в представление компонента в Laravel
    </h3>
    В представление компонента можно передавать данные. Смотрите пример:
    <pre>//file: app/View/Components/Header.php
	class Header extends Component
	{
		public function render()
		{
			return view('components.header', [
				'var1' => 1,
				'var2' => 2,
			]);
		}
	}</pre>
    Выведем переданные данные в представлении:
    <pre>//file: resources/views/components/header.blade.php
&lt;p>&#123;&#123; $var1 }}&lt;/p>
&lt;p>&#123;&#123; $var2 }}&lt;/p></pre>
    <x-task.head :data="['components_task9', 'Задача:']" />
    <x-task.body :tasks="[
        '/blade/components-task/17' =>
            'Передайте в компонент User имя, фамилию и возраст юзера. Выведите эти данные в отдельных тегах.',
        '/blade/components-task/18' => 'Передайте в компонент Info массив строк. Выведите их в виде списка ul.',
    ]" />
    <br />
    <br />
    <h3>
        Получение данных из БД в компоненте в Laravel
    </h3>
    В классах компонентов можно получать данные из БД и отправлять в представление для отрисовки. Для примера давайте
    сделаем компонент, динамически формирующий меню сайта. Пусть в этом меню будут ссылки на категории.
    <br />
    Для начала заюзаем модель категорий:
    <pre>//filepath: App/View/Components/Nav.php

&lt;?php
	use App\Models\Category;

	class Nav extends Component
	{

	}</pre>
    Теперь получим список категорий и отравим их в представление:
    <pre>//filepath: App/View/Components/Nav.php

&lt;?php
	class Nav extends Component
	{
		public function render()
		{
			$categories = Category::all();

			return view('components.nav', [
				'categories' => $categories,
			]);
		}
	}</pre>
    А теперь выведем переданные данные в представлении:
    <pre>//filepath: App/View/Components/Nav.php

&lt;nav>
	&#64;foreach ($categories as $category)
		&lt;a href="&#123;&#123; $category['slug'] }}">&#123;&#123; $category['name'] }}&lt;/a>
	&#64;endforeach
&lt;/nav></pre>
    <x-task.head :data="['components_task10', 'Задача:']" />
    <x-task.body :tasks="[
        '/blade/components-task/19' => 'Сделайте компонент, выводящий ссылки на 5 самых популярных постов.',
    ]" />


</x-layout>
