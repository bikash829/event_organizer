<?php

namespace App\View\Components\service;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ServiceCategory;

class serviceCategoryItem extends Component
{

    public ServiceCategory $category;
    /**
     * Create a new component instance.
     */

    public function __construct(ServiceCategory $category)
    {
        //
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service.service-category-item');
    }
}
