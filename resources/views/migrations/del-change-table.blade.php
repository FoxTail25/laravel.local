<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    <h3>
        Операции с таблицами в Laravel
    </h3>
    <h4>
        Удаление таблиц
    </h4>
    Для удаления таблиц используется метод drop:
    <pre>Schema::drop('posts');</pre>
    Но лучше перед удалением проверить существование таблицы
    <pre>Schema::dropIfExists('posts');</pre>
    <h4>
        Переименование таблиц в Laravel
    </h4>
    Для переименования существующей таблицы используется метод rename. Первым параметром он принимает старое имя
    таблицы, а вторым - новое. Давайте переменуем таблицу posts:
    <pre>Schema::rename('posts', 'articles')</pre>
</x-layout>
