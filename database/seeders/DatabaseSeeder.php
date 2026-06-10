<?php

// namespace Database\Seeders;

// use App\Models\User;
// // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         // User::factory(10)->create();

//         User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
//     }
// }


// namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Seeder;


// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         // Метод upsert() или create() автоматически заполнит timestamps
//         User::query()->upsert([
//             [
//                 'name' => 'name1',
//                 'surname' => 'surname1',
//                 'email' => 'test1@mail.ru',
//             ],
//             [
//                 'name' => 'name2',
//                 'surname' => 'surname2',
//                 'email' => 'test2@mail.ru',
//             ],
//         ], uniqueBy: ['email'], update: ['name', 'surname']);
//     }
// }



// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

// class DatabaseSeeder extends Seeder
// {
//     public function run()
//     {
//         DB::table('users')->insert([
//             'name' => Str::random(10),
//             'surname'  => Str::random(10),
//             'email'  => Str::random(50),
//         ]);
//     }
// }
