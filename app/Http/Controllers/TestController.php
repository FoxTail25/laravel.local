<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function paginateTest(){
        $users = User::paginate(5);
        return view('test.paginate',['data'=> $users]);
    }
}
