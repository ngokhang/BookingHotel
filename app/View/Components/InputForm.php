<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputForm extends Component
{
    public $type = 'text';
    public $value;
    public $class = '';
    public $title = '';
    public $name = '';
    public $id = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $value, $class, $title, $name, $id)
    {
        $this->type = $type;
        $this->value = $value;
        $this->class = $class;
        $this->title = $title;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.account.input-form');
    }
}
