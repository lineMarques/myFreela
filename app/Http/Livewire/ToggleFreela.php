<?php

namespace App\Http\Livewire;

use App\Models\{
    Freela,
    Invite
};
use Livewire\Component;

class ToggleFreela extends Component
{
    public Freela $freela;
    public Invite $invite;
    public string $status;
    public bool $toggle;


    public function mount()
    {
        $this->toggle = (bool) $this->freela->getAttribute($this->status);
    }

    public function updating($status, $value)
    {
        $freela = $this->freela;
        $invite = $this->invite;
        if ($$invite->confirmacao) {
            dd($freela, 'teste');
        }
        $this->freela->setAttribute($this->status, $value)->save();
    }

    public function render()
    {
        return view('livewire.toggle-freela');
    }
}
