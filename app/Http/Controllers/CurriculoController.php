<?php

namespace App\Http\Controllers;

use App\Models\{
    Address,
    Institution,
    PersonalData,
    User
};
use App\Http\Requests\CurriculoUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CurriculoController extends Controller
{
    protected $user;
    protected $address;
    protected $personalData;
    protected $institution;

    public function __construct(User $user, PersonalData $personalData, Address $address, Institution $institution)
    {
        $this->user = $user;
        $this->personalData = $personalData;
        $this->address = $address;
        $this->institution = $institution;
    }

    public function create()
    {
        $user = $this->user->find(Auth::id());
        $institution = DB::select('SELECT nome_da_ies FROM institutions');

        return view('curriculo.partials.create-curriculo', compact('user', 'institution'));
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $this->user->find(Auth::id());
        $user->aboutMe()->create($request->all());
        $user->experiences()->create($request->all());

        return Redirect::route('dashboard.freelancer', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = $request->user();

        if (empty($user->experiences)) {
            return Redirect::route('curriculo.create');
        } else {
            return view('curriculo.edit-curriculo', compact('user'));
        }
    }

    public function update(Request $request):RedirectResponse
    {
        $user = $this->user->find(Auth::id());

        if ($user->experiences == null) {
            $user->update($request->all());
            return view('livewire.dashboard0');
        } else {
            $user->update($request->all());
            $user->aboutMe->update($request->all());
            $xp = $user->experiences->where('user_id', $user->id)->first();
            $xp->update($request->all());
            return Redirect::route('curriculo.edit');
        }
    }

    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        $user->aboutMe->delete();
        $user->experiences()->delete();

        return Redirect::to('/dashboard');
    }
}
