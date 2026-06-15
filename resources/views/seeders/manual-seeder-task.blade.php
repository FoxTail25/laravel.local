<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'user1',
                'surname' => 'sur1',
                'email' => 'ema1@mail.ru'
            ],
            [
                'name' => 'user2',
                'surname' => 'sur2',
                'email' => 'ema2@mail.ru'
            ],
            [
                'name' => 'user3',
                'surname' => 'sur3',
                'email' => 'ema3@mail.ru'
            ],
        ]);
    }
}</pre>
        </div>
    @elseif ($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

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
}</pre>
        </div>
    @endif
    <a href="/seeders/manual-seeder">Назад</a>
</x-layout>
