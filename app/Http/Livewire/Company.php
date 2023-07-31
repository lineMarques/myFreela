<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Company extends Component
{

    public function index()
    {
        $user = Auth::user();
        return view('livewire.dashboard', compact('user'));
    }
    
    public function render()
    {
        return view('livewire.company.company');
    }
}
