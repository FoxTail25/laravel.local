<?php

namespace App\View\Components\education;

use Illuminate\View\Component;

class Info extends Component
{
    public function render()
    {
        return view('components.education.info', [
            'strArr' =>
            [
                'some str0',
                'some str1',
                'some str2',
            ]
        ]);
    }
}
