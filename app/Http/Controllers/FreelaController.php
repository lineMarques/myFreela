<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Freela;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

class FreelaController extends Controller
{
    protected $user;
    protected $company;
    protected $freela;

    public function __construct(User $user, Company $company, Freela $freela)
    {
        $this->user = $user;
        $this->company = $company;
        $this->freela = $freela;
    }
    public function index()
    {
        $freelas = $this->freela
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('livewire.dashboard', compact('freelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('freela.partials.create-freela-form');
    }

    public function store(Request $request)
    {
        $user = $this->user->find(Auth::id());
        $company = $user->company;
        $company->freelas()->create($request->all());

        return Redirect::route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $freela = $this->freela->find($id);
        return view('freela.edit-freela', compact('freela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $freela = $this->freela->find($id);
        $freela->update($request->all());
        return Redirect::route('freela.update', $id)->with('status', 'freelaUpdated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
