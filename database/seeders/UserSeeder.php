<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Добавляем пользователей в таблицу
        DB::table('users')->insert($this->getRandomUser(10));
    }
    public function getRandomUser(int $ciclys): array
    {
        // Функция для создания фейковых пользователей.
        $resultArr = [];
        $curretTime = now();

        for ($i = 1; $i <= $ciclys; $i++) {
            $resultArr[] = [
                'name' => 'userName' . $i,
                'email' => Str::random(10) . '@gmail.com',
                'age' => mt_rand(10, 30), // рандомное значение от 10 до 30
                'salary' => mt_rand(1000, 3000), // рандомное значение от 1000 до 3000
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ];
        }

        return $resultArr;
    }
}
