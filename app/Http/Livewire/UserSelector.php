<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserSelector extends Component
{

    public $usertype = 0; // 0 for student , 1 for organization , 2 for university
    public $showDiv = 0; //0 for hide , 1 for show

    public function render()
    {
        return view('livewire.user-selector');
    }

    public function openDiv()
    {
        $this->showDiv =$this->usertype;
    }
}
