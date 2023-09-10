<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class Cep extends Component
{
    public array $data = [];

    protected $rules = [
        'data.cep' => 'integer|FormatoCep',
    ];

    protected array $messages = [

        'data.cep.integer' => 'Formato de cep inválido.',
    ];

    public function mount()
    {

        $this->data = [
            'cep',
            'road',
            'number',
            'neighborhood',
            'city',
            'state'
        ];
    }

    public function updated(string $key, string $value)
    {
        $this->validate();

        $response = Http::get(url: "https://viacep.com.br/ws/{$value}/json/")->json();


        if (!empty($response['erro'])) {
            session()->flash('message', 'O Cep é inválido');
        } else {

            $this->data['cep'] = $response['cep'];
            $this->data['road'] = $response['logradouro'];
            $this->data['neighborhood'] = $response['bairro'];
            $this->data['city'] = $response['localidade'];
            $this->data['state'] = $response['uf'];
        };


    }

    public function render()
    {
        return view('livewire.cep');
    }
}
