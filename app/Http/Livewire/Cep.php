<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Cep extends Component
{
    public $cep;
    public $road;
    public $neighborhood;
    public $city;
    public $state;


    protected $rules = [
        'cep' => 'integer|FormatoCep',
    ];

    protected array $messages = [

        'cep.integer' => 'Formato de cep inválido.',
    ];

    public function mount()
    {
        $this->road;
        $this->neighborhood;
        $this->city;
        $this->state;
        $this->cep;
    }

    public function updated(string $key, string $value)
    {

        $response = Http::get(url: "https://viacep.com.br/ws/{$value}/json/")->json();

        if (!empty($response['erro'])) {
            session()->flash('message', 'O Cep é inválido');
        } else {
            $this->cep = $response['cep'];
            $this->road = $response['logradouro'];
            $this->neighborhood = $response['bairro'];
            $this->city = $response['localidade'];
            $this->state = $response['uf'];
        };
    }

    public function render()
    {
        return view('livewire.cep');
    }
}
