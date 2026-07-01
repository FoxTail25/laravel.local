<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Создаем первую страну
        $russia = Country::create(['name' => 'Россия']);

        // Добавляем города для Германии через связь cities()
        $russia->cities()->createMany([
            ['name' => 'Москва'],
            ['name' => 'Санкт-Петербург'],
            ['name' => 'Казань'],
        ]);

        // 2. Создаем вторую страну
        $france = Country::create(['name' => 'Франция']);

        // Добавляем города для Франции
        $france->cities()->createMany([
            ['name' => 'Париж'],
            ['name' => 'Марсель'],
            ['name' => 'Лион'],
        ]);

        // 3. Создаем третью страну
        $italy = Country::create(['name' => 'Италия']);

        $italy->cities()->createMany([
            ['name' => 'Рим'],
            ['name' => 'Милан'],
        ]);
    }
}
