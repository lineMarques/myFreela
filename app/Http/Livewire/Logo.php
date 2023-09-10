<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Logo extends Component
{
    use WithFileUploads;

    public $logo;

    public function storageLogo()
    {

        $this->validate([
            'logo' => 'required|image|max:1024'
        ]);

        $company = Company::where('user_id', Auth::id())->first();

        $nameFile = Str::slug($company->companyName) . '.' . $this->logo->extension();


        if ($logo = $this->logo->storeAs('companys', $nameFile)) {

            $company->image()->create([

                'image' => $logo,

            ]);
        };

        return Redirect::route('company.edit')->with('status', 'logo-updated');
    }

    public function updateLogo(Request $request)
    {


        $this->validate([
            'logo' => 'required|image|max:1024'
        ]);

        $company = Company::where('user_id', Auth::id())->first();
        $nameFile = Str::slug($company->companyName) . '.' . $this->logo->extension();

        if ($logo = $this->logo->storeAs('companys', $nameFile)) {



            $company = $company->image()->where('imageable_id', $company->id)->first();
            $company->update($request->all());
        };

        return Redirect::route('company.edit')->with('status', 'image-updated');
    }
    public function render()
    {
        return view('livewire.logo');
    }
}
