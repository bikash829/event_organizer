<?php

namespace App\View\Components\admin\layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $routeName;
    public function __construct($title, $routeName)
    {
        //
        $this->title = $title;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.layouts.header');
    }
}
