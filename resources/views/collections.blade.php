<x-layout>
    <x-slot:title>
        Коллекции в PHP
    </x-slot:title>
    <h4>
        Коллекции в Laravel
    </h4>
    <h5>
        Введение
    </h5>
    <p>
        Класс Illuminate\Support\Collection обеспечивает гибкую и удобную обертку для работы с массивами данных.
        Например, посмотрите на следующий код. Здесь мы будем использовать помощник collect, чтобы создать новый
        экземпляр коллекции из массива, запустим функцию strtoupper для каждого элемента, а затем удалим все пустые
        элементы:
        <pre>
            $collection = collect(['taylor', 'abigail', null])
            ->map(function ($name) {
                return strtoupper($name);
            })
            ->reject(function ($name) {
                return empty($name);
            });
        </pre>
        Как видите, класс Collection позволяет объединять необходимые вам методы в цепочку для выполнения
        последовательного перебора и сокращения базового массива. В-основном коллекции неизменяемы, то есть каждый метод
        коллекции возвращает совершенно новый экземпляр Collection.
    </p>
    <h5>
        Создание коллекций
    </h5>
    <p>
        Как упоминалось выше, помощник collect возвращает новый экземпляр Illuminate\Support\Collection для переданного
        массива. Итак, создать коллекцию очень просто:
        <pre>
            $collection = collect([1, 2, 3]);
        </pre>
    </p>
    <h5>
        Расширение коллекций
    </h5>
    <p>
        Класс Collection являются «макропрограммируемым», что позволяет вам добавлять дополнительные методы к классу во
        время выполнения. Метод macro класса Illuminate\Support\Collection принимает замыкание, которое будет выполнено
        при вызове вашей макрокоманды. Замыкание макрокоманды может обращаться к другим методам коллекции через $this,
        как если бы это был реальный метод класса коллекции. Например, следующий код добавляет метод toUpper классу
        Collection:
        <pre>
            use Illuminate\Support\Collection;
            use Illuminate\Support\Str;

            Collection::macro('toUpper', function () {
                return $this->map(function ($value) {
                    return Str::upper($value);
                });
            });

            $collection = collect(['first', 'second']);

            $upper = $collection->toUpper();

            // ['FIRST', 'SECOND']
        </pre>
    </p>
    <h5>
        Аргументы макрокоманды
    </h5>
    <p>
        При необходимости вы можете определить макрокоманды, которые принимают дополнительные аргументы:
        <pre>
            use Illuminate\Support\Collection;
            use Illuminate\Support\Facades\Lang;

            Collection::macro('toLocale', function ($locale) {
                return $this->map(function ($value) use ($locale) {
                    return Lang::get($value, [], $locale);
                });
            });

            $collection = collect(['first', 'second']);

            $translated = $collection->toLocale('es');
        </pre>
    </p>
    <h5>
        Доступные методы
    </h5>
    <p>
        <a href="https://github.com/russsiq/laravel-docs-ru/blob/9.x/docs/collections.md#user-content-доступные-методы"
            target="_blank"> В
            большей части оставшейся
            документации по коллекциям мы обсудим каждый метод, доступный в классе Collection.
            Помните, что все эти методы можно объединить в цепочку для последовательного управления базовым массивом.
            Более
            того, почти каждый метод возвращает новый экземпляр Collection, позволяя вам при необходимости сохранить
            исходную копию коллекции:</a>


        {{-- <a href="#all">all</a>
        <a href="#average">average</a>
        <a href="#avg">avg</a>
        <a href="#chunk">chunk</a> --}}
    </p>
    {{-- <div class="collect-metod" id="all">
        <h4>all()</h4>
        Метод all возвращает базовый массив, представленный коллекцией:
        <pre>
            collect([1, 2, 3])->all();
            // [1, 2, 3]
        </pre>
    </div>
    <div class="collect-metod" id="average">
        <h4>average()</h4>
        Псевдоним для метода <a href="#avg">avg()</a>
    </div>
    <div class="collect-metod" id="avg">
        <h4>avg()</h4>
        Метод avg возвращает среднее значение переданного ключа:
        <pre>
        $average = collect([
            ['foo' => 10],
            ['foo' => 10],
            ['foo' => 20],
            ['foo' => 40]
        ])->avg('foo');

        // 20

        $average = collect([1, 1, 2, 4])->avg();

        // 2
        </pre>
    </div>
    <div class="collect-metod" id="chunk">
        <h4>chunk()</h4>
        Метод chunk разбивает коллекцию на несколько меньших коллекций указанного размера:
        <pre>
        $collection = collect([1, 2, 3, 4, 5, 6, 7]);

        $chunks = $collection->chunk(4);

        $chunks->all();

        // [[1, 2, 3, 4], [5, 6, 7]]
        </pre>
        Этот метод особенно полезен в шаблонах при работе с сеткой, такой как Bootstrap. Например, представьте, что у
        вас есть коллекция моделей Eloquent, которые вы хотите отобразить в сетке:
        <pre>
        &#64;foreach ($products->chunk(3) as $chunk)
            &lt;div class="row">
                &#64;foreach ($chunk as $product)
                    &lt;div class="col-xs-4">&#123;&#123; $product->name &#125;&#125;&lt;/div>
                &#64;endforeach
            &lt;/div>
        &#64;endforeach
        </pre>
    </div> --}}

</x-layout>
