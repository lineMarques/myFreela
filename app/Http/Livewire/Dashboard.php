<?php

namespace App\Http\Livewire;

use App\Models\Freela;
use Livewire\Component;

class Dashboard extends Component
{
    public $freela;

    public function mount()
    {
        $this->freela = Freela::all();
    }

   
    public function render()
    {
        return view('livewire.dashboard');
    }
}
