<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    public function run(): void
    {
        $professionNameArr = ['программист', 'devOps', 'sysAdmin'];
        foreach ($professionNameArr as $professionName) {

            Profession::create(['name' => $professionName]);
        }

    }
}
