<?php

namespace App\View\Components\education;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
    /**
     * Create a new component instance.
     */
    public string $path;
    public string $alt;

    public function __construct(string $path, string $alt)
    {
        $this->path = $path;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.education.logo', ['path' => $this->path, 'alt' => $this->alt]);
    }
}
