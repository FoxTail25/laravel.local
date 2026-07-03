<x-layout>
    <x-slot:title>
        Связбь многие ко многим в Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
    1) создаём таблицу professions:
    php artisan make:migration create_professions

    2) заполняем методы up и down
    public function up(): void
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('professions');
    }

    3) создаём pivot таблицу employee_profession
    php artisan make:migration create_employee_profession_table

    4) Прописываем методы up и down
    public function up(): void
    {
        Schema::create('employee_profession', function (Blueprint $table) {
            $table->id(); // Главный ключ самой pivot-таблицы

            // Внешние ключи с каскадным удалением
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('profession_id')->constrained()->onDelete('cascade');
            // временные метки
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('employee_profession');
    }

    5) запускаем миграцию на создание таблиц
    php artisan migrate

    !!Теперь нужно заполнить таблицы данным!!

    6) создаём модель для таблицы professions
    php artisan make:model Profession

    7) создаём сеятель для зполнения таблицы profession
    php artisan make:seeder ProfessionSeeder

    8) прописываем метод run()
    public function run(): void
    {
        $professionNameArr = ['программист', 'devOps', 'sysAdmin'];
        foreach ($professionNameArr as $professionName) {

            Profession::create(['name' => $professionName]);
        }

    }

    9) запускаем наш сеятель:
    php artisan db:seed --class=ProfessionSeeder


        </pre>
        <a href="/relationship/many-to-many#task1">назад</a>
    @elseif ($id == 2)
    @endif
</x-layout>
