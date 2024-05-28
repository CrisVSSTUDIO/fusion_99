<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pricing extends Component
{
    public $view;
    /**
     * Create a new component instance.
     */
    public function __construct($view)
    {
        $this->view = $view;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pricing', [
            'view' => $this->view,
        ]);
    }
}
