<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DbController extends Controller
{
    public function intro(int|string $id, int|null $getTask = null)
    {
        $task = [
            '1' => [
                'text' => "Подключите фасад DB к контроллеру юзеров.",
                'data' => [],
            ],
        ];
        if ($getTask) {
            return array_keys($task);
        }
        return view('DB.intro-task', ['id' => $id, 'text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
    }

    public function record(int|string $id, int|null $getTask = null)
    {
        $tasks = [
            '1' => [
                'text' => "Получите все записи из таблицы users. Переберите полученные записи циклом и выведите их в представлении в виде HTML таблицы.",
                'data' => fn() => [DB::table('users')->get()],
            ],
            '2' => [
                'text' => "При получении данных из таблицы с юзерами оставьте в выборке только поля name и email.",
                'data' => fn() => [DB::table('users')->select('name', 'email')->get()],
            ],
            '3' => [
                'text' => "При получении данных из таблицы с юзерами переименуйте поле email на user_email.",
                'data' => fn() => [DB::table('users')->select('name', 'email as user_email')->get()],
            ],


            '4' => [
                'text' => "Получите коллекцию имен всех юзеров. Передайте в представление коллекцию юзеров, полученную в предыдущей задаче. Выведите эти данные в виде списка ul.",
                'data' => fn() => DB::table('users')->pluck('name'),
            ],
            '5' => [
                'text' => "Получите одного юзера",
                'data' => fn() => DB::table('users')->first(),
            ],
            '6' => [
                'text' => "Получите первых 3 юзера.",
                'data' => fn() => DB::table('users')->take(3)->get(),
            ],
            '7' => [
                'text' => "Получите первых 3 юзера, начиная с 4го",
                'data' => fn() => DB::table('users')->skip(2)->take(3)->get(),
            ],



        ];
        if ($getTask) {
            return count($tasks);
        }

        $resultData = $tasks[$id]['data']();

        return view('DB.records-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }


    public function recordWhere(int|string $id, int|null $getTask = null)
    {
        $tasks = [

            '1' => [
                'text' => "Получите всех юзеров с возрастом, равным 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', 30)->get()],
            ],
            '2' => [
                'text' => "Получите всех юзеров с возрастом, не равным 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '!=', 30)->get()],
            ],
            '3' => [
                'text' => "Получите всех юзеров с возрастом, больше 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '>', 30)->get()],
            ],
            '4' => [
                'text' => "Получите всех юзеров с возрастом, меньше 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '<', 30)->get()],
            ],
            '5' => [
                'text' => "Получите всех юзеров с возрастом, меньшим или равным 30 лет.",
                'data' => fn() => [DB::table('users')->where('age', '<=', 30)->get()],
            ],
            '6' => [
                'text' => "Получите всех юзеров с возрастом от 20 до 30 лет.",
                'data' => fn() => [DB::table('users')
                    ->where('age', '>', '20')
                    ->where('age', '<', '30')
                    ->get()],
            ],
            '7' => [
                'text' => "Получите всех юзеров с возрастом 30 или id, большем 4.",
                'data' => fn() => [DB::table('users')
                    ->where('age', '30')
                    ->orWhere('id', '>', '4')
                    ->get()],
            ],
            '8' => [
                'text' => "Получите всех юзеров с возрастом 30, или зарплатой 500, или id, большем 9",
                'data' => fn() => [DB::table('users')
                    ->where('age', '30')
                    ->orWhere('salary', '500')
                    ->orWhere('id', '>', '9')
                    ->get()],
            ],
            '9' => [
                'text' => "Получите юзеров, у которых зарплата равна 500 либо возраст от 20 до 30.",
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
                'text' => "Получите юзеров, возраст которых находится НЕ в промежутке от 20 до 30.",
                'data' => fn() => DB::table('users')->whereNotBetween('age', [20, 30])->get(),
            ],
            '11' => [
                'text' => "Получите юзеров с id, равными 1, 2, 3 и 5.",
                'data' => fn() => DB::table('users')->whereIn('id', [1, 2, 3, 5])->get(),
            ],
            '12' => [
                'text' => "Получите юзера с полем id, равным 3.",
                'data' => fn() => DB::table('users')->whereId(3)->get(),
            ],
            '13' => [
                'text' => "получите юзера с полем name, равным 'userName5'",
                'data' => fn() => DB::table('users')->whereName('userName5')->get(),
            ],
            '14' => [
                'text' => "Получите юзера с полем id, равным 3, ИЛИ полем age, равным 20.",
                'data' => fn() => DB::table('users')->whereIdOrAge(3, 20)->get(),
            ],

        ];
        if ($getTask) {
            return count($tasks);
        }

        $resultData = $tasks[$id]['data']();

        return view('DB.records-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
    public function recordSort(int|string $id, int|null $getTask = null)
    {
        $tasks = [
            '1' => [
                'text' => "Получите всех юзеров и отсортируйте их по возрастанию возраста.",
                'data' => fn() => DB::table('users')->orderBy('age')->get(),
            ],
            '2' => [
                'text' => "Получите всех юзеров и отсортируйте их по убыванию зарплаты.",
                'data' => fn() => DB::table('users')->orderBy('salary', 'desk')->get(),
            ],
            '3' => [
                'text' => "Получите всех юзеров и отсортируйте их по убыванию поля created_at.",
                'data' => fn() => DB::table('users')->oldest()->get(),
            ],
            '4' => [
                'text' => "Получите юзеров с возрастом больше 30 и отсортируйте их по возрастанию поля created_at.",
                'data' => fn() => DB::table('users')->where('age', '>', 20)->latest()->get(),
            ],
            '5' => [
                'text' => "Получите юзеров с возрастом меньше 20 и отсортируйте их по возрастанию поля updated_at.",
                'data' => fn() => DB::table('users')->where('age', '<', 20)->latest('updated_at')->get(),
            ],
            '6' => [
                'text' => "Получите всех юзеров, отсортированных в случайном порядке.",
                'data' => fn() => DB::table('users')->inRandomOrder()->get(),
            ],
            '7' => [
                'text' => "Получите одного случайного юзера.",
                'data' => fn() => DB::table('users')->inRandomOrder()->first(),
            ],
            '8' => [
                'text' => "Получите всех юзеров с возрастом от 20 до 30, отсортированных в случайном порядке.",
                'data' => fn() => DB::table('users')->whereBetween('age', [20, 30])->inRandomOrder()->get(),
            ],
            '9' => [
                'text' => "Получите одного случайного юзера с возрастом от 20 до 30.",
                'data' => fn() => DB::table('users')->whereBetween('age', [20, 30])->inRandomOrder()->first(),
            ],
        ];
        if ($getTask) {
            return count($tasks);
        }

        $resultData = $tasks[$id]['data']();

        return view('DB.record-sort-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
    public function InsertUpdateDel(int|string $id)
    {

        $tasks = [
            '1' => [
                'text' => "Вставьте нового юзера в таблицу с юзерами.",
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
                'text' => "Вставьте нового юзера в таблицу с юзерами. Выведите на экран id вставленного юзера.",
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
                'text' => "Вставьте нового юзера в таблицу с юзерами. Выведите на экран id вставленного юзера.",
                'data' => function () {
                    // return DB::table('users')->insert([
                    return  createNewUser(3);
                    // ]);
                },
            ],
        ];
        function createNewUser(int $count)
        {
            $result = [];
            $nextUserNumber = DB::table('users')->count();
            $currentTime = Carbon::now();

            for ($i = 1; $i <= $count; $i++) {
                $result[] = [
                    'name' => "userName" . $nextUserNumber + $i,
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

        return view('DB.insert-update-del-task', ['id' => $id, 'text' => $tasks[$id]['text'], 'data' => $resultData]);
    }
}
