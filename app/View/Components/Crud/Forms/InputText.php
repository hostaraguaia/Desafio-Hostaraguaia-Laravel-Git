<?php

namespace Crud\View\Components\Crud\Forms;

use Illuminate\View\Component;

class InputText extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.crud.forms.input-text');
    }
}
