<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateUsersCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем всех пользователей и еребираем всех пользователей построчно (по 10 записей)
        DB::table('users')->orderBy('id')->chunkById(10, function ($users) {
            foreach ($users as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        // функция PHP генерирует число от 1 до 4
                        'city' => rand(1, 4),
                    ]);
            }
        });
    }
}
