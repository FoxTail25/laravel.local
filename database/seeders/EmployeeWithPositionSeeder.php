<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Seeder;

class EmployeeWithPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Сначала создаем должности, чтобы у них появились ID 1 и 2
        // Используем метод insert() или create()
        Position::query()->create(['name' => 'chief']);
        Position::query()->create(['name' => 'worker']);

        // 2. Цикл создания сотрудников
        for ($i = 1; $i <= 10; $i++) {
            Employee::query()->create([
                'name' => 'employee'.$i,
                'city_id' => rand(1, 8),
                'position_id' => in_array($i, [5, 10]) ? 1 : 2,
            ]);
        }
    }
}
