<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $color = "success";
    public $tipo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = "success", $tipo = "success")
    {
        $this->color = $color;
        $this->tipo = $tipo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
