<?php

namespace App\Http\Livewire;

use App\Models\Freela;
use Livewire\Component;

class ToggleFreela extends Component
{
    public Freela $freela;
    public string $status;
    public bool $toggle;


    public function mount(){

        $this->toggle = (bool) $this->freela->getAttribute($this->status);
    }

    public function updating($status, $value)
    {
        $this->freela->setAttribute($this->status, $value)->save();
    }

    public function render()
    {
        return view('livewire.toggle-freela');
    }
}
