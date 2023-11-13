<?php

namespace App\Http\Controllers;

use App\Models\{
    Address,
    Company,
    User,
};
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{

    protected $user;
    protected $address;
    protected $company;

    public function __construct(User $user, Company $company, Address $address)
    {
        $this->user = $user;
        $this->company = $company;
        $this->address = $address;
    }

    public function index()
    {
        return view('livewire.dashboard');
    }


    public function create()
    {
        $user = $this->user->find(Auth::id());
        return view('company.partials.create-company');
    }


    public function store(Request $request): RedirectResponse
    {
        $user = $this->user->find(Auth::id());
        $user->company()->create($request->all());
        return Redirect::route('dashboard', compact('user'));
    }


    public function show($id)
    {
        $user = $this->user->find(Auth::id());
        $company = $this->company::where('user_id', Auth::id())->latest()->first();

        return view('livewire.dashboard', compact('user'));
    }


    public function edit(Request $request)
    {
        $user = $request->user();
        $company = $this->company->where('user_id', $user->id)->first();

        if(empty($user->company)){
            return Redirect::route('company.create');
        }else{
            return view('company.edit-company', compact('user', 'company'));
        }
    }


    public function update(Request $request)
    {
        $company = $this->company->where('user_id', Auth::id())->first();
        $company->update($request->all());
        return Redirect::route('company.edit', compact('company'))->with('status', 'company-updated');
    }

   
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        $user->company->delete();

        return Redirect::to('/dashboard');
    }
}
