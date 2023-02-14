<?php

namespace App\View\Components\Forms\Buttons;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Action extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $mainRoute, public Model $model)
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
        return view('components.forms.buttons.action');
    }
}
