<?php

namespace App\View\Components\sweetalert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        // public boolean 
        public string $title = '',
        public string $message = '',
        public string $icon = '',
        public string $type = '',
        public string $confirmButtonText = '',
        public string $cancelButtonText = '',
        public string $method = '',
        public string $route = '',
        public string $id = '',
        public string $class = '',
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sweetalert.alert');
    }
}
