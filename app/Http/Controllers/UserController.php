<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // подключаем фасад DB
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public function getAllRecord()
    {
        /*
        Запрос выполнится только тогда, когда таблица РЕАЛЬНО существует
        Иначе при миграции  php artisan migrate:fresh --seed придётся комментировать роут, который ссылается на этот код
        */
        if (Schema::hasTable('users')) {

            $allUsers = DB::table('users')->get();
            return $allUsers;
        }
    }
    public function getFieldRecord(array $filedsArr)
    {
        if (Schema::hasTable('users')) {

            $allUsers = DB::table('users')->select('name', 'email')->get();
            return $allUsers;
        }
    }
}
