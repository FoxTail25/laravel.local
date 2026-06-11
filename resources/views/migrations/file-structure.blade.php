<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    <h2>
        Структура файлов миграции в Laravel
    </h2>
    <div>
        Общая схема работы с миграциями будет следующей. Пусть вы хотите что-то изменить в структуре базы данных. Для
        этого вы командой artisan создаете файл с миграцией, затем в этом файле прописываете изменения в структуре базы
        данных, а затем выполняете еще одну команду artisan, которая применит описанные вами изменения.
        <br />
        Файлы миграций располагаются в папке database/migrations. Имя каждого файла состоит из и метки времени и
        названия миграции.
        <br />
        Пример:
        "2026_06_11_084900_create_sessions_table.php"
        <br />
        Это позволяет фреймворку определять порядок применения миграций.
        <br />
        Файлы миграций создаются с помощью artisan команды make:migration, после которой указывается имя миграции.
        <br />
        В результате будет создан класс с миграцией, в котором будут методы up и down:
        <pre>
&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * Run the migrations.
    */
        public function up()
        {

        }
    /**
    * Reverse the migrations.
    */
        public function down()
        {

        }
}
        </pre>
        В методе up прописываются команды, которые осуществляют миграцию, (создание, изменение, удаление таблиц и полей
        в таблицах). А в методе down команды, которые позволят откатить эту миграцию назад. Т.е. противоположные
        действия. (если в методе up() прописано создание таблицы, то в методе Down() прописывается удаление этой
        таблицы)
        <br />
        Имя миграции должно соответствовать сути изменения. В этом случае Laravel сгенерирует дополнительный код,
        осуществляющий миграцию и ее откат.
        <br />
        Посмотрим на практике. Давайте создадим миграцию, которая будет создавать таблицу posts. Для этого в качестве
        имени миграции выберем create_posts_table.
        <br />
        Теперь выполнем в терминале следующую команду:
        <pre>
            php artisan make:migration create_posts_table</pre>
        В результате Laravel создаст файл с классом миграции. При этом он поймет из названия, что мы хотим создать новую
        таблицу и сгенерирует дополнительный код для создания и отката этой миграции.
        <br />
        Структура созданного файла будет выглядеть следующим образом:
        <pre>
&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};</pre>
    </div>
    <a href="/migrations/file-structure-task/1">Задача 1</a>
    <a href="/migrations/file-structure-task/2">Задача 2</a>




</x-layout>
