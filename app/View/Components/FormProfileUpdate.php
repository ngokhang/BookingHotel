<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormProfileUpdate extends Component
{
    public $dataUser;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dataUser)
    {
        //
        $this->dataUser = $dataUser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.account.form-profile-update');
    }
}
