<?php

namespace App\View\Components\admin\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class splitButtonItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $buttonItems
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.buttons.split-button-item');
    }
}
