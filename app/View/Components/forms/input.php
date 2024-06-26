<?php

namespace App\View\Components\forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $colSize = "col-12",
        public string $type = 'text',
        public string $name = "",
        public string $label = "",
        public string $value = "",
        public string $class = "",
        public string $maxLength = "",
        public string $minLength = "",
        public string $placeholder = "",
        public string $rows = "",
        public string|null $id = null,
        public bool $isRequired = false, //boolean
        public string|null $errorKey = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
