<x-layout>
    <x-slot:title>
        Миграции в Laravel
    </x-slot:title>

    <h2>
        Поля в миграциях Laravel
    </h2>
    <h3>
        Изменение атрибутов полей в миграция
    </h3>
    Можно изменять тип данных существующего поля. Это делается с помощью метода change. Давайте посмотрим на пример.
    <br />
    Пусть в таблице с постами мы задали поле title размером 50 символов. Давайте увеличим это поле до 100 символов:
    <pre>
	public function up()
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->string('title', 100)->change();
		});
	}
    </pre>
    <a href="/migrations/migration-fields-task/1">Задача 1</a>

    <h3>
        Удаление полей в миграциях
    </h3>
    Для удаления полей используется метод dropColumn:
    <pre>
    public function up()
	{
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('age');
    	});
	}
    </pre>
    Можно удалить несколько столбцов таблицы, передав в качестве параметра метода массив их имен:
    <pre>
    public function up()
	{
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['name','surname']);
    	});
	}
    </pre>
    <a href="/migrations/migration-fields-task/2">Задача 2</a>
    <a href="/migrations/migration-fields-task/3">Задача 3</a>
    <h3>
        Переименование полей в миграциях Laravel
    </h3>
    Для переименования полей используется метод renameColumn:
    <pre>
    Schema::table('posts', function (Blueprint $table) {
		$table->renameColumn('name', 'title');
	});</pre>
    <a href="/migrations/migration-fields-task/4">Задача 4</a>
    <h3>
        Модификаторы полей в миграциях Laravel
    </h3>
    При создании или при изменении полей мы можем не только задавать им тип, но и указывать некоторые модификаторы.
    <h4>
        Обнуляемость
    </h4>
    С помощью метода nullable можно сделать столбец обнуляемым (в этом случае поле может принимать значение null):
    <pre>
    Schema::create('posts', function (Blueprint $table) {
		$table->string('desc')->nullable();
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>
	Schema::table('posts', function (Blueprint $table) {
		$table->string('desc')->nullable()->change();
	});</pre>
    <h4>
        Значение по умолчанию
    </h4>
    С помощью метода default можно указать для поля значение по умолчанию:
    <pre>
	Schema::create('posts', function (Blueprint $table) {
		$table->string('desc')->default('some value');
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>
	Schema::table('posts', function (Blueprint $table) {
		$table->string('desc')->default('some value')->change();
	});</pre>
    <h4>
        Комментарии
    </h4>
    С помощью метода default можно указать для поля значение по умолчанию:
    <pre>
	Schema::create('posts', function (Blueprint $table) {
		$table->string('desc')->comment('my comment');
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>
	Schema::table('posts', function (Blueprint $table) {
		$table->string('desc')->comment('my comment')->change();
	});</pre>

    <h4>
        Безнаковость
    </h4>
    С помощью метода unsigned можно сделать поле типа integer беззнаковыми UNSIGNED (т.е. в такое поле нальзя записать
    отрицательные числа):
    <pre>
	Schema::create('posts', function (Blueprint $table) {
		$table->integer('vote')->unsigned();
	});</pre>
    Можно задавать модификатор не только при создании поля, но и при его изменении:
    <pre>
	Schema::table('posts', function (Blueprint $table) {
		$table->integer('vote')->unsigned()->change();
	});</pre>

    <a href="/migrations/migration-fields-task/5">Задача 5</a>
    <a href="/migrations/migration-fields-task/6">Задача 6</a>
    <a href="/migrations/migration-fields-task/7">Задача 7</a>
    <a href="/migrations/migration-fields-task/8">Задача 8</a>

    <h3>
        Порядок полей в миграциях Laravel
    </h3>
    Можно менять порядок полей в таблицах. Для этого есть два метода (только для баз MySQL).
    <h4>
        На первое место
    </h4>
    Метод first помещает поле первым в таблице:
    <pre>
    Schema::table('posts', function (Blueprint $table) {
        $table->string('title')->first()->change();
	});</pre>
    <h4>После поля</h4>
    А метод after помещает поле после указанного поля:
    <pre>
    Schema::table('posts', function (Blueprint $table) {
        $table->string('title')->after('id')->change();
	});</pre>

    <a href="/migrations/migration-fields-task/9">Задача 9</a>
    <a href="/migrations/migration-fields-task/10">Задача 10</a>



</x-layout>
