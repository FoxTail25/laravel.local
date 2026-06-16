<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UserSeeder
     */
    public function run(): void
    {
        // Передаем 10 для генерации
        DB::table('users')->insert($this->getRandomUser(10));
    }
    /**
     * Генерирует массив случайных пользователей
     */
    public function getRandomUser(int $cycles): array
    {
        $resultArr = [];
        $passwordHash = Hash::make('12345'); // Хэшируем ОДИН раз за пределами цикла для экономии процессора
        $currentTime = now(); // Настоящее дата - время

        for ($i = 1; $i <= $cycles; $i++) {

            $email = Str::random(10) . '@mail.ru'; // Генерируем рандомный емаил

            $resultArr[] = [
                'name' => Str::random(5),
                'surname' => Str::random(7),
                'email' => $email,
                'password' => $passwordHash,
                'created_at' => $currentTime,
                'updated_at' => $currentTime, // Заполняем оба таймстампа
            ];
        }
        return $resultArr;
    }
}
