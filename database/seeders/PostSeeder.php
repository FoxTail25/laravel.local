<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Добавляем посты в таблицу
        DB::table('posts')->insert($this->getRandomPost(10));
    }
    public function getRandomPost(int $ciclys): array
    {
        // Функция для создания фейковых постов.
        $resultArr = [];
        $curretTime = now();

        for ($i = 1; $i <= $ciclys; $i++) {
            $resultArr[] = [
                'title' => Str::random(5),
                'slug' => Str::random(7),
                'likes' => 0,
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ];
        }

        return $resultArr;
    }
}
