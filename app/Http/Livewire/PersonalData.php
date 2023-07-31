<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class PersonalData extends Component
{
    use WithFileUploads;

    public $photo;

    public function storagePhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:1024'
        ]);

        $user = Auth::user();
        $nameFile = Str::slug($user->userName) . '.' . $this->photo->extension();

        $photo = '';

        if ($photo = $this->photo->storeAs('users', $nameFile)) {
            $user->personalData->update([
                'photo' => $photo,
            ]);
        };
    }

    
    public function render()
    {
        return view('livewire.curriculo.personal-data');
    }
}
