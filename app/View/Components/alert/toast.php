<?php

namespace App\View\Components\alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class toast extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $positionY,
        public string $positionX,
        public string $message,
        public string $time,
        public string $title,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.toast');
    }
}
