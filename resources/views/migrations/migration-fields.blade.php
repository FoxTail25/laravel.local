<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    <h3>
        Поля в миграциях Laravel
    </h3>
    <h4>
        Изменение атрибутов полей в миграция
    </h4>
    Можно изменять тип данных существующего поля. Это делается с помощью метода change. Давайте посмотрим на пример.
    <br />
    Пусть в таблице с постами мы задали поле title размером 50 символов. Давайте увеличим это поле до 100 символов:
    <pre>public function up()
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->string('title', 100)->change();
		});
	}</pre>
    <x-page.content.task.head :data="['migration-field_task1', 'Задача:']" />
    <x-page.content.task.body href='migration-fields-task' :tasks="[
        1 => [
            'text' => 'В таблице с юзерами измените размер поля name.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Удаление полей в миграциях
    </h4>
    Для удаления полей используется метод dropColumn:
    <pre>public function up()
	{
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('age');
    	});
	}</pre>
    Можно удалить несколько столбцов таблицы, передав в качестве параметра метода массив их имен:
    <pre>public function up()
	{
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['name','surname']);
    	});
	}</pre>
    <x-page.content.task.head :data="['migration-field_task2', 'Задачи:']" />
    <x-page.content.task.body href='migration-fields-task' :tasks="[
        2 => [
            'text' => 'Написать миграцию на удалени из таблицы с юзерами поле age.',
        ],
        3 => [
            'text' => 'Написать миграцию на удалени из таблицы с юзерами поле name и surname.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Переименование полей в миграциях Laravel
    </h4>
    Для переименования полей используется метод renameColumn:
    <pre>   Schema::table('posts', function (Blueprint $table) {
    $table->renameColumn('name', 'title');
    });</pre>
    <x-page.content.task.head :data="['migration-field_task3', 'Задача:']" />
    <x-page.content.task.body href='migration-fields-task' :tasks="[
        4 => [
            'text' => 'В таблице с юзерами переименуйте поле name в поле first_name, а поле surname в second_name.',
        ],
    ]" />
    <br />
    <br />

    <h4>
        Модификаторы полей в миграциях Laravel
    </h4>
    При создании или при изменении полей мы можем не только задавать им тип, но и указывать некоторые модификаторы.
    <h5>
        Обнуляемость
    </h5>
    С помощью метода nullable можно сделать столбец обнуляемым (в этом случае поле может принимать значение null):
    <pre>    Schema::create('posts', function (Blueprint $table) {
		$table->string('desc')->nullable();
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>	Schema::table('posts', function (Blueprint $table) {
		$table->string('desc')->nullable()->change();
	});</pre>
    <h5>
        Значение по умолчанию
    </h5>
    С помощью метода default можно указать для поля значение по умолчанию:
    <pre>	Schema::create('posts', function (Blueprint $table) {
		$table->string('desc')->default('some value');
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>	Schema::table('posts', function (Blueprint $table) {
		$table->string('desc')->default('some value')->change();
	});</pre>
    <h5>
        Комментарии
    </h5>
    С помощью метода default можно указать для поля значение по умолчанию:
    <pre>	Schema::create('posts', function (Blueprint $table) {
		$table->string('desc')->comment('my comment');
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>	Schema::table('posts', function (Blueprint $table) {
		$table->string('desc')->comment('my comment')->change();
	});</pre>

    <h5>
        Безнаковость
    </h5>
    С помощью метода unsigned можно сделать поле типа integer беззнаковыми UNSIGNED (т.е. в такое поле нальзя записать
    отрицательные числа):
    <pre>	Schema::create('posts', function (Blueprint $table) {
		$table->integer('vote')->unsigned();
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>	Schema::table('posts', function (Blueprint $table) {
		$table->integer('vote')->unsigned()->change();
	});</pre>
    <x-page.content.task.head :data="['migration-field_task4', 'Задачи:']" />
    <x-page.content.task.body href='migration-fields-task' :tasks="[
        5 => [
            'text' => 'Добавьте в таблице с юзерами комментарий к полю email.',
        ],
        6 => [
            'text' => 'Сделайте так, чтобы в таблице с юзерами поле salary по умолчанию принимало значение 0.',
        ],
        7 => [
            'text' => 'Разрешите в таблице с юзерами полю age принимать значение null.',
        ],
        8 => [
            'text' => 'Сделайте в таблице с юзерами поле age беззнаковым.',
        ],
    ]" />

    <h4>
        Порядок полей в миграциях Laravel
    </h4>
    Можно менять порядок полей в таблицах. Для этого есть два метода (только для баз MySQL).
    <h5>
        На первое место
    </h5>
    Метод first помещает поле первым в таблице:
    <pre>
    Schema::table('posts', function (Blueprint $table) {
        $table->string('title')->first()->change();
	});</pre>
    <h5>
        После поля
    </h5>
    А метод after помещает поле после указанного поля:
    <pre>
    Schema::table('posts', function (Blueprint $table) {
        $table->string('title')->after('id')->change();
	});</pre>
    <i>Модификатор ->after() корректно работает в MySQL и MariaDB. Если мы используем PostgreSQL или SQLite, этот
        модификатор будет просто проигнорирован, и поле добавится в самый конец таблицы.</i>

    <x-page.content.task.head :data="['migration-field_task5', 'Задачи:']" />
    <x-page.content.task.body href='migration-fields-task' :tasks="[
        9 => [
            'text' => 'В таблице с юзерами переместите поле name на первое место.',
        ],
        10 => [
            'text' => 'Добавьте к таблице с юзерами новое поле sex поле поля id.',
        ],
    ]" />

</x-layout>
