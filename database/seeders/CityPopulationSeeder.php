<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CityPopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 получаем все города:
        $cities = City::all();

        foreach ($cities as $city) {
            $city->population = rand(80000, 120000);
            $city->save();
        }
    }
}
