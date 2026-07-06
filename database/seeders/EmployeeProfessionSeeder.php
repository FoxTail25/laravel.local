<?php

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
