<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DisableButton extends Component
{
    public $buttonClicked = false;

    public function clickButton()
    {
        $this->buttonClicked = true;
        

    }

    public function render()
    {
        return view('livewire.disable-button');
    }
}
