<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Image extends Component
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

        if ($photo = $this->photo->storeAs('users', $nameFile)) {

            $user->image()->create([

                'image' => $photo,

            ]);
        };

        return Redirect::route('profile.edit')->with('status', 'image-updated');

    }

    public function updatePhoto(Request $request)
    {
        $this->validate([
            'photo' => 'required|image|max:1024'
        ]);

        $user = Auth::user();
        $nameFile = Str::slug($user->userName) . '.' . $this->photo->extension();

        if ($photo = $this->photo->storeAs('users', $nameFile)) {

            $user = $user->image()->where('imageable_id', $user->id)->first();
            $user->update($request->all());
        };

        return Redirect::route('profile.edit')->with('status', 'image-updated');

    }

    public function render()
    {
        return view('livewire.image');
    }
}
