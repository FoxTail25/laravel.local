<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    <h2>
        Операции с таблицами в Laravel
    </h2>
    <h3>
        Удаление таблиц
    </h3>
    Для удаления таблиц используется метод drop:
    <pre>
        Schema::drop('posts');</pre>
    Но лучше перед удалением проверить существование таблицы
    <pre>
        Schema::dropIfExists('posts');</pre>
    <h3>
        Переименование таблиц в Laravel
    </h3>
    Для переименования существующей таблицы используется метод rename. Первым параметром он принимает старое имя
    таблицы, а вторым - новое. Давайте переменуем таблицу posts:
    <pre>
        Schema::rename('posts', 'articles')
    </pre>
</x-layout>
