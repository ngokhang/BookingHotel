<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileSidebarMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $avatar;
    public string $fullname;
    public function __construct($avatar, $fullname)
    {
        //
        $this->avatar = $avatar;
        $this->fullname = $fullname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.account.profile-sidebar-menu');
    }
}
