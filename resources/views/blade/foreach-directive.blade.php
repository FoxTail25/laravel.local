<x-layout>
    <x-slot:title>
        blade - циклы
    </x-slot:title>
    <h2>
        Циклы в Blade в Laravel
    </h2>
    <div>
        <h3>
            Директива &#64;foreach в Blade в Laravel
        </h3>
        В данном уроке мы разберем директиву &#64;foreach шаблонизатора Blade, представляющую собой цикл для перебора массива.
        <br />
        Рассмотрим работу данной директивы на практическом примере. Пусть из действия в представление передается какой-то массив $arr.
        <br />
        Переберем этот массив циклом и выведем его элементы на экран:
        <pre>
            &#64;foreach ($arr as $elem)
            &#123;&#123; $elem &#125;&#125;
            &#64;endforeach
        </pre>
        Давайте выведем каждый элемент массива в отдельном абзаце:
        <pre>
            &#64;foreach ($arr as $elem)
            &lt;p>&#123;&#123; $elem &#125;&#125;&lt;/p>
            &#64;endforeach
        </pre>
        Давайте выведем элементы нашего массива в виде списка ul:
        <pre>
            &lt;ul>
                &#64;foreach ($arr as $elem)
                &lt;li>&#123;&#123; $elem &#125;&#125;&lt;/li>
                &#64;endforeach
            &lt;/ul>
        </pre>
    </div>
    <a href="/blade/foreach-directive-task/1">Задача 1</a>
    <a href="/blade/foreach-directive-task/2">Задача 2</a>
    <a href="/blade/foreach-directive-task/3">Задача 3</a>
    <div>
        <h3>
            Ключи массива в цикле &#64;foreach в Blade в Laravel
        </h3>
        Можно также получить в отдельную переменную ключи массива, аналогично циклу foreach в PHP:
        <pre>
            &#64;foreach ($arr as $key => $elem)
            &#123;&#123; $key &#125;&#125;&#123;&#123; $elem &#125;&#125;
            &#64;endforeach
        </pre>
        Часто бывает так, что хотелось бы вывести рядом с элементами массива их порядковые номера, но не очень удобно то, что нумерация в массивах начинается с 0. Для решения проблемы можно просто прибавлять единицу на выводе ключа:
        <pre>
            &#64;foreach ($arr as $key => $elem)
            &#123;&#123; $key + 1 &#125;&#125;&#123;&#123; $elem &#125;&#125;
            &#64;endforeach
        </pre>
    </div>
    <a href="/blade/foreach-directive-task/4">Задача 1</a>
    <a href="/blade/foreach-directive-task/5">Задача 2</a>
    <div>
        <h3>
            Условия и циклы &#64;foreach в Blade в Laravel
        </h3>
        Директиву &#64;foreach можно комбинировать с директивой &#64;if. Выведем, например, только положительные элементы массива:
        <pre>
            &lt;ul>
                &#64;foreach ($arr as $elem)
                    &#64;if ($elem > 0)
                        &lt;li>&#123;&#123; $elem &#125;&#125;&lt;/li>
                    &#64;endif
                &#64;endforeach
            &lt;/ul>
        </pre>
        А теперь, наоборот, выведем список только в том случае, если количество элементов в массиве больше нуля:
        <pre>
            &#64;if (coutn($arr) > 0)
                &lt;ul>
                    &#64;foreach ($arr as $elem)
			            &lt;li>&#123;&#123; $elem &#125;&#125;&lt;/li>
		            &#64;endif
                &lt;/ul>
	        &#64;endforeach
        </pre>
    </div>
    <a href="/blade/foreach-directive-task/6">Задача 1</a>
    <a href="/blade/foreach-directive-task/7">Задача 2</a>
    <div>
        <h3>
            Вложенные циклы &#64;foreach в Blade в Laravel
        </h3>
        Пусть из действия в представление передается вот такой массив:
        <pre>
            $arr = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
        </pre>
        Давайте выведем элементы этого массива, используя вложенный друг в друга директивы &#64;foreach:
        <pre>
            &#64;foreach ($arr as $subArr)
	            &#64;foreach ($subArr as $elem)
		            &#123;&#123; $elem &#125;&#125;
        	    &#64;endforeach
            &#64;endforeach
        </pre>
        А теперь при выводе в представлении давайте из нашего массива сформируем два вложенных списка:
        <pre>
            &lt;ul>
                &#64;foreach ($arr as $subArr)
                    &lt;li>
                        &lt;ul>
                            &#64;foreach ($subArr as $elem)
                                &lt;li>&#123;&#123; $elem &#125;&#125;&lt;/li>
                            &#64;endforeach
                        &lt;/ul>
                    &lt;/li>
                &#64;endforeach
            &lt;/ul>
        </pre>
    </div>
    <a href="/blade/foreach-directive-task/8">Задача 1</a>
    <div>
        <h3>
            Перебор многомерных массивов в Blade в Laravel
        </h3>
        Пусть у нас дан вот такой массив с пользователями:
        <pre>
	$users = [
                [
                    'name' => 'user1',
                    'age' => 21,
                ],
                [
                    'name' => 'user2',
                    'age' => 22,
                ],
                [
                    'name' => 'user3',
                    'age' => 23,
                ],
            ];
        </pre>
        Давайте выведем содержимое этого массива в виде списка ul:
        <pre>
            &lt;ul>
                &#64;foreach ($users as $user)
                    &lt;li>&#123;&#123; $user['name'] &#125;&#125; &#123;&#123; $user['age'] &#125;&#125;&lt;/li>
                &#64;endforeach
            &lt;/ul>
        </pre>
        <a href="/blade/foreach-directive-task/9">Задача 1</a>
        <a href="/blade/foreach-directive-task/10">Задача 2</a>
        <div>
            <h3>
                Цикл &#64;forelse в Blade в Laravel
            </h3>
            В Blade также встроен интересный цикл &#64;forelse, также перебирающий массивы. Работает он следующим образом: если в массиве есть элементы, то цикл их переберет, а если элементов нет, то выведет сообщение из блока &#64;empty:
            <pre>
            &#64;forelse ($arr as $elem)
                &lt;p>&#123;&#123; $elem &#125;&#125;&lt;/p>
            &#64;empty
                &lt;p>array is empty&lt;/p>
            &#64;endforelse
            </pre>
        </div>
</x-layout>
