<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DbController extends Controller
{
    public function intro(Request $request, int|string $id)
    {
        // В этом разделе ?? задачи. создаём массив с номерами задач для проверки
        $tasks = range(1, 1);

        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[($id - 1)])) {
            abort(404, 'Задача не найдена');
        }

        return view('DB.intro-task', ['id' => $id, 'text' => $request->text]);
    }

    public function record(Request $request, int|string $id)
    {
        $tasks = [
            '1' => [
                'data' => fn() => [DB::table('users')->get()][0],
            ],
            '2' => [
                'data' => fn() => [DB::table('users')->select('name', 'email')->get()],
            ],
            '3' => [
                'data' => fn() => [DB::table('users')->select('name', 'email as user_email')->get()],
            ],
            '4' => [
                'data' => fn() => DB::table('users')->pluck('name'),
            ],
            '5' => [
                'data' => fn() => DB::table('users')->first(),
            ],
            '6' => [
                'data' => fn() => DB::table('users')->take(3)->get(),
            ],
            '7' => [
                'data' => fn() => DB::table('users')->skip(2)->take(3)->get(),
            ],
        ];
        if (!isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('DB.records-task', ['id' => $id, 'text' => $request->text, 'data' => $resultData]);
    }


    public function recordWhere(Request $request, string $id )
    {
        $tasks = [

            '1' => [
                'data' => fn() => [DB::table('users')->where('age', 30)->get()],
            ],
            '2' => [
                'data' => fn() => [DB::table('users')->where('age', '!=', 30)->get()],
            ],
            '3' => [
                'data' => fn() => [DB::table('users')->where('age', '>', 30)->get()],
            ],
            '4' => [
                'data' => fn() => [DB::table('users')->where('age', '<', 30)->get()],
            ],
            '5' => [
                'data' => fn() => [DB::table('users')->where('age', '<=', 30)->get()],
            ],
            '6' => [
                'data' => fn() => [DB::table('users')
                    ->where('age', '>', '20')
                    ->where('age', '<', '30')
                    ->get()],
            ],
            '7' => [
                'data' => fn() => [DB::table('users')
                    ->where('age', '30')
                    ->orWhere('id', '>', '4')
                    ->get()],
            ],
            '8' => [
                'data' => fn() => [DB::table('users')
                    ->where('age', '30')
                    ->orWhere('salary', '500')
                    ->orWhere('id', '>', '9')
                    ->get()],
            ],
            '9' => [
                'data' => fn() => [DB::table('users')
                    ->where('salary', '500')
                    ->orWhere(function ($query) {
                        $query
                            ->where('age', '>', 20)
                            ->where('age', '<', 30);
                    })
                    ->get()],
            ],
            '10' => [
                'data' => fn() => DB::table('users')->whereNotBetween('age', [20, 30])->get(),
            ],
            '11' => [
                'data' => fn() => DB::table('users')->whereIn('id', [1, 2, 3, 5])->get(),
            ],
            '12' => [
                'data' => fn() => DB::table('users')->whereId(3)->get(),
            ],
            '13' => [
                'data' => fn() => DB::table('users')->whereName('userName5')->get(),
            ],
            '14' => [
                'data' => fn() => DB::table('users')->whereIdOrAge(3, 20)->get(),
            ],
        ];

        if (!isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('DB.record-where-task', ['id' => $id, 'text' => $request->text, 'data' => $resultData]);
    }
    public function recordSort(Request $request, int|string $id)
    {
        $tasks = [
            '1' => [
                'data' => fn() => DB::table('users')->orderBy('age')->get(),
            ],
            '2' => [
                'data' => fn() => DB::table('users')->orderBy('salary', 'desc')->get(),
            ],
            '3' => [
                'data' => fn() => DB::table('users')->oldest()->get(),
            ],
            '4' => [
                'data' => fn() => DB::table('users')->where('age', '>', 20)->latest()->get(),
            ],
            '5' => [
                'data' => fn() => DB::table('users')->where('age', '<', 20)->latest('updated_at')->get(),
            ],
            '6' => [
                'data' => fn() => DB::table('users')->inRandomOrder()->get(),
            ],
            '7' => [
                'data' => fn() => DB::table('users')->inRandomOrder()->first(),
            ],
            '8' => [
                'data' => fn() => DB::table('users')->whereBetween('age', [20, 30])->inRandomOrder()->get(),
            ],
            '9' => [
                'data' => fn() => DB::table('users')->whereBetween('age', [20, 30])->inRandomOrder()->first(),
            ],
        ];

        if (!isset($tasks[$id])) {
            abort(404, 'Задача не найдена');
        }

        $resultData = $tasks[$id]['data']();

        return view('DB.record-sort-task', ['id' => $id, 'text' => $request->text, 'data' => $resultData]);
    }
    public function InsertUpdateDel(Request $request, int|string $id)
    {

        $tasks = [
            '1' => [
                'data' => function () {
                    $nextUserNumber = DB::table('users')->count() + 1;
                    $currentTime = Carbon::now();

                    return DB::table('users')->insert([
                        'name' => "userName{$nextUserNumber}",
                        'email' => "userName{$nextUserNumber}@gmail.com",
                        'age' => mt_rand(30, 50),
                        'salary' => fake()->numberBetween(2000, 3000),
                        'created_at' => $currentTime,
                        'updated_at' => $currentTime,
                    ]);
                },
            ],
            '2' => [
                'data' => function () {
                    $nextUserNumber = DB::table('users')->count() + 1;
                    $currentTime = Carbon::now();

                    return DB::table('users')->insertGetId([
                        'name' => "userName{$nextUserNumber}",
                        'email' => "userName{$nextUserNumber}@gmail.com",
                        'age' => mt_rand(30, 50),
                        'salary' => fake()->numberBetween(2000, 3000),
                        'created_at' => $currentTime,
                        'updated_at' => $currentTime,
                    ]);
                },
            ],
            '3' => [
                'data' => function () {
                    return DB::table('users')->insert(
                        createNewUser(3)
                    );
                },
            ],
            '4' => [
                'data' => fn() => DB::table('users')->where('id', 5)->update(['email' => 'userName5@gmail.com'])
            ],
            '5' => [
                'data' => fn() => DB::table('users')->where('age', '>', 30)->update(['salary' => '5000'])
            ],
            '6' => [
                'data' => fn() => DB::table('users')->where('id', 1)->increment('age')
            ],
            '7' => [
                'data' => fn() => DB::table('users')->where('id', 1)->decrement('age')
            ],
            '8' => [
                'data' => fn() => DB::table('users')->where('id', 5)->increment('salary', 100)
            ],
            '9' => [
                'data' => function () {
                    // вернётся количество удалённых строк
                    return DB::table('users')
                        ->where('id', DB::table('users')->max('id'))
                        ->delete();
                }
            ],
            '10' => [
                'data' => function () {
                    return 'Я не выполняю этот код что бы никого не удалять))';
                }
            ],
            '11' => [
                'data' => function () {
                    return 'Я не выполняю этот код что бы никого не удалять))';
                }
            ],
            '12' => [
                'data' => fn() => DB::table('users')
                    ->leftJoin('citys', 'citys.id', '=', 'users.city')
                    ->select('users.name as user', 'citys.name as city')
                    ->get()
            ],
        ];
        function createNewUser(int $count)
        {
            $result = [];
            $nextUserNumber = DB::table('users')->count();
            $currentTime = Carbon::now();

            for ($i = 1; $i <= $count; $i++) {
                $result[] = [
                    'name' => "userName" . ($nextUserNumber + $i),
                    'email' => "userName" . ($nextUserNumber + $i) . "@gmail.com",
                    'age' => mt_rand(30, 50),
                    'salary' => fake()->numberBetween(2000, 3000),
                    'created_at' => $currentTime,
                    'updated_at' => $currentTime,
                ];
            }
            return $result;
        }


        // Проверка безопасности: если передали несуществующий ID задачи
        if (!isset($tasks[$id])) {
            abort(404, "Задача не найдена");
        }

        $resultData = $tasks[$id]['data']();

        return view('DB.insert-update-del-task', ['id' => $id, 'text' => $request->text, 'data' => $resultData]);
    }
}
