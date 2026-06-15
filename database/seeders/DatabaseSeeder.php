<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert($this->getRendomUser(10));
    }
    public function getRendomUser(int $cycles)
    {
        $resultArr = [];
        for ($i = 1; $i <= $cycles; $i++) {
            $resultArr[] = [
                'name' => Str::random(5),
                'surname' => Str::random(7),
                'email' => Str::random(5) . '@mail.ru'
            ];
        }
        return $resultArr;
    }
}
