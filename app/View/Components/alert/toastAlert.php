<?php

namespace App\View\Components\alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class toastAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $positionY = "top-0",
        public string $positionX = "end-0",
        public string $message = "Operation successful",
        public string $time = "0 Mins",
        public string $title = "Alert",
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.toast-alert');
    }
}
