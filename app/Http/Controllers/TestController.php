<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function paginateTest()
    {
        $users = User::paginate(5);
        return view('test.paginate', ['data' => $users]);
    }
    public function post(int $id)
    {
        $post = Post::where('id', '=', $id)->get();
        return view('components.education.post', ['post' => $post[0]]);
    }
}
