<x-layout>
    <x-slot:title>
        Seeder в Laravel
    </x-slot:title>

    <h2>
        Seeder в Laravel
    </h2>

    <h3>Наполнение БД фиктивными данными в Laravel</h3>
    В Laravel можно заполнять таблицы БД фиктивными данными. Это делается с помощью специальных классов сидеров (seed -
    семя, seeder - сеялка). Эти классы располагаются в папке database/seeders.
    <br />
    По умолчанию там уже есть класс DatabaseSeeder, представляющий собой заготовку, которой можно пользоваться. У этого
    класса есть метод run, в котором мы будем прописывать команды на заполнение таблиц базы данных:
    <pre>
    &lt;?php
    use Illuminate\Database\Seeder;

        class DatabaseSeeder extends Seeder
        {
            public function run()
            {
                // команды
            }
        }</pre>
    Далее будут рассмотрены различные способы заполнения базы данными.
</x-layout>
