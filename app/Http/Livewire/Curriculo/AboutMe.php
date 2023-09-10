<?php

namespace App\Http\Livewire\Curriculo;

use App\Models\Institution;
use Livewire\Component;
use Livewire\Request;

class AboutMe extends Component
{
    public $query;
    public $institutions;

    public function mount()
    {
        $this->query = '';
        $this->institutions = [];
    }

    public function updatedQuery(){

        $this->institutions = Institution::where('sigla', 'ilike', '%'.$this->query.'%')
        ->orWhere('nome_da_ies', 'ilike', '%'.$this->query.'%')
        ->get()
        ->toArray();

    }

    public function getValue($value)
    {
        $this->institutions = $value;
    }

    public function render()
    {
        return view('livewire.curriculo.aboutMe');
    }
}
