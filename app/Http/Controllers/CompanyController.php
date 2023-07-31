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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livewire.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->user->find(Auth::id());
        return view('company.partials.create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $user = $this->user->find(Auth::id());
        $user->company()->create($request->all());

        $company = $this->company::where('user_id', Auth::id())->latest()->first();
        $company->address()->create($request->all());

        return Redirect::route('dashboard', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find(Auth::id());
        $company = $this->company::where('user_id', Auth::id())->latest()->first();
        return view('livewire.dashboard', compact('user'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $company = $this->company->where('user_id', Auth::id())->first();        
        $company->update($request->all());
        $company->address->update($request->all());        

        return Redirect::route('company.edit', compact('company'))->with('status', 'company-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
