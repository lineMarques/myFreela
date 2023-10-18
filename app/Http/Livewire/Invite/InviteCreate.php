<?php

namespace App\Http\Livewire\Invite;

use App\Models\Invite;
use Livewire\Component;

class InviteCreate extends Component
{
    public Invite $invite;

    public function update()
    {
        
    }
    public function render()
    {
        return view('livewire.invite.invite-create');
    }
}
