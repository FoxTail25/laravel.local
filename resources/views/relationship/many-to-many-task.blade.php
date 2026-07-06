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

    10) Добавляем метод belongToMany в модель Employee:
    public function professions(){
        return $this->belongsToMany(Profession::class);
    }

    11) Добавляем метод belongToMany в модель Profession:
    public function employees(){
        return $this->belongsToMany(Employee::class);
    }

    12) Создаём сеятель для заполнения pivot таблицы:
    php artisan make:seeder EmployeeProfessionSeeder

    13) Заполняем метод run:
    namespace Database\Seeders;

    use App\Models\Employee;
    use App\Models\Profession;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class EmployeeProfessionSeeder extends Seeder
    {
        public function run(): void
        {
            // 1. Получаем всех сотрудников и все профессии из базы
            $employees = Employee::all();
            $professions = Profession::all();

            // 2. Перебираем каждого сотрудника
            foreach ($employees as $employee) {
                // Берем случайное количество профессий (например, от 1 до 3)
                $randomProfessions = $professions->random(rand(1, 3));

                // Получаем только их ID (например, [2, 5, 7])
                $professionIds = $randomProfessions->pluck('id')->toArray();

                // 3. Заполняем pivot-таблицу для этого сотрудника
                $employee->professions()->attach($professionIds);
            }
        }
    }

    14) Запускаем сеятель для pivot таблицы:
    php artisan db:seed --class=EmployeeProfessionSeeder
        </pre>
        <a href="/relationship/many-to-many#task1">назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        $employees = Employee::all();
        return $employees;

        // Blade code:
        &#64;foreach ($data as $employee)
            &lt;h5>Имя сотрудника: &#123;&#123; $employee->name }}&lt;/h5>
            список профессий которыми он владеет:
            &lt;ul>
                &#64;foreach ($employee->professions as $profession)
                    &lt;li>
                        &#123;&#123; $profession->name }}
                    &lt;/li>
                &#64;endforeach
            &lt;/ul>
        &#64;endforeach

        </pre>
        @foreach ($data as $employee)
            <h5>Имя сотрудника: {{ $employee->name }}</h5>
            список профессий которыми он владеет:
            <ul>
                @foreach ($employee->professions as $profession)
                    <li>
                        {{ $profession->name }}
                    </li>
                @endforeach
            </ul>
        @endforeach
        <a href="/relationship/many-to-many#task1">назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
        // Controller code:
        $professions = Profession::all();
        return $professions;

        // Blade code:
        &#64;foreach ($data as $profession)
            &lt;h5>Профессия: &#123;&#123; $profession->name }}&lt;/h5>
            список тех, кто ею владеет:
            &lt;ul>
                &#64;foreach ($profession->employees as $employee)
                    &lt;li>
                        &#123;&#123; $employee->name }}
                    &lt;/li>
                &#64;endforeach
            &lt;/ul>
        &#64;endforeach

        </pre>
        @foreach ($data as $profession)
            <h5>Профессия: {{ $profession->name }}</h5>
            список тех, кто ею владеет:
            <ul>
                @foreach ($profession->employees as $employee)
                    <li>
                        {{ $employee->name }}
                    </li>
                @endforeach
            </ul>
        @endforeach
        <a href="/relationship/many-to-many#task1">назад</a>
    @endif
</x-layout>
