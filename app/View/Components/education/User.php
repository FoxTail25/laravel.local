<?php

namespace App\View\Components\education;

use Illuminate\View\Component;

class User extends Component
{
    public function render()
    {
        return view('components.education.user', [
            'firstName' => 'Smit',
            'secondName' => 'John',
            'age' => '42',
        ]);
    }
}
