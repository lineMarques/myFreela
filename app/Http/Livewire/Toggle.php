<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Toggle extends Component
{
    public User $user;
    public string $active;
    public bool $toggle;

    public function mount(){

       $this->toggle = (bool) $this->user->getAttribute($this->active);

    }

    public function updating($active, $value){
        $this->user->setAttribute($this->active, $value)->save();
    }

    public function render()
    {
        return view('livewire.toggle');
    }
}
