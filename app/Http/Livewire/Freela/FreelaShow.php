<?php

namespace App\Http\Livewire\Freela;

use App\Models\Freela;
use Livewire\Component;

class FreelaShow extends Component
{
    public $freelas;

    public function mount()
    {
        $this->freelas = Freela::orderby('created_at', 'DESC')->paginate(10);
    }

    public function render()
    {
        return view('livewire.freela.freela-show');
    }
}
