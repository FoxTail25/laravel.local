<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curretTime = now();
        //Заполнение таблицы городов
        DB::table('citys')->insert([
            [
                'name' => 'Москва',
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ],
            [
                'name' => 'Минск',
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ],
            [
                'name' => 'Рязань',
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ],
            [
                'name' => 'Кострома',
                'created_at' => $curretTime,
                'updated_at' => $curretTime,
            ],
        ]);
    }
}
