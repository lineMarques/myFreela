<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreelaUpdateRequest;
use App\Mail\InviteFreelancers;
use App\Models\Company;
use App\Models\Freela;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

global $freela;

class FreelaController extends Controller
{
    protected $user;
    protected $company;
    protected $freela;
    protected $invite;
    public $vaga;

    public function __construct(User $user, Company $company, Freela $freela, Invite $invite)
    {
        $this->user = $user;
        $this->company = $company;
        $this->freela = $freela;
        $this->invite = $invite;
    }

    public function index()
    {
        $user = $this->user->find(Auth::id());

        if ($user->typeUser == 'gerente') {
            $company = $this->company->where('user_id', Auth::id())->first();

            if (!empty($this->freela)) {
                $freelas = $this->freela->where('company_id', $company->id);

                $freelas = $freelas->orderBy('created_at', 'DESC')
                    ->paginate(10);

                return view('livewire.dashboard', compact('freelas'));
            } else {

                return view('livewire.dashboard');
            }
        }

        return view('livewire.dashboard');
    }


    public function create()
    {
        return view('freela.partials.create-freela-form');
    }

    public function store(FreelaUpdateRequest $request)
    {
        $user = $this->user->find(Auth::id());
        $company = $user->company;
        $company->freelas()->create($request->all());

        return Redirect::route('dashboard', compact('company'));
    }

    public function edit($id)
    {
        $freela = $this->freela->find($id);
        return view('freela.edit-freela', compact('freela'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $freela = $this->freela->find($id);
        $freela->update($request->all());
        return Redirect::route('freela.update', $id)->with('status', 'freelaUpdated');
    }

    public function searchFreelancer(Request $request)
    {
        $this->vaga = $this->freela->where('id', $request->freela)->first();
        $listaFuncionarios = getFreelancer($request->cargo);

        $listaFuncionarios->each(function ($funcionario) {
            $funcionario = $this->user->where('id', $funcionario->user_id)->first();

            Mail::to($funcionario)->send(new InviteFreelancers($funcionario->email));

            $this->invite->create([
                'freela_id' => $this->vaga->id,
                'user_id' => $funcionario->id,
                'company_id' => $this->vaga->company_id,
                'confirmacao' => false,
            ]);
        });

        return Redirect::route('dashboard');
    }

    public function destroy(Request $request, $id)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $freela = $this->freela->find($id);
        $freela->delete();

        return Redirect::to('/dashboard');
    }
}
