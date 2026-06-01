<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function show()
    {
        return view('user.testView', ['title' => 'show', 'text' => 'Hello from user controller method:show']);
    }
    public function all()
    {
        return view('user.testView', ['title' => 'all', 'text' => 'Hello from user controller method:all']);
    }
    public function name($surname, $name)
    {
        return view('user.testView', ['title' => 'name', 'text' => "Hello from user controller method:name $surname $name"]);
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
        if (!array_key_exists($user, $users)) {
            return 'Нет такого имени';
        }
        return $users[$user];
    }
    public function testView()
    {
        return view('user.testView', ['title' => 'testView', 'text' => 'Hello FoxTail']);
    }
}
