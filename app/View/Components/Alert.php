<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    
    public $type;
    public $messages;

    public function __construct($type, $messages)
    {
        $this->type = $type;
        $this->messages = $messages;
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
