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
        В большей части оставшейся документации по коллекциям мы обсудим каждый метод, доступный в классе Collection.
        Помните, что все эти методы можно объединить в цепочку для последовательного управления базовым массивом. Более
        того, почти каждый метод возвращает новый экземпляр Collection, позволяя вам при необходимости сохранить
        исходную копию коллекции:
    </p>

</x-layout>
