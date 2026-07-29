<?php

namespace App\View\Components\education;

use App\Models\Post;
use Illuminate\View\Component;

class FivePosts extends Component
{
    public function render()
    {
        $posts = Post::All();
        return view('components.education.fiveposts', ['posts' => $posts]);
    }
}
