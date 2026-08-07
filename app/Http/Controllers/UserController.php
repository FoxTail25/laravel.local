<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function show()
    {
        return "Контроллер: UserController, действие show";
    }
    public function all()
    {
        return "Контроллер: UserController, действие all";
    }
    public function name(string $name)
    {
        return "name: $name";
    }
    public function surnameAndName(string $surname, string $name)
    {
        return "surname: $surname, name: $name";
    }
    public function userCity($user)
    {
        $users = [
            'user1' => 'city1',
            'user2' => 'city2',
            'user3' => 'city3',
            'user4' => 'city4',
            'user5' => 'city5',
        ];
        return $users[$user];
    }
    public function userCitySave($user = null)
    {
        $users = [
            'user1' => 'city1',
            'user2' => 'city2',
            'user3' => 'city3',
            'user4' => 'city4',
            'user5' => 'city5',
        ];
        if (isset($users[$user])) {
            return $users[$user];
        } else {
            return 'запрошенные данные отсутствуют';
        }
    }
}
