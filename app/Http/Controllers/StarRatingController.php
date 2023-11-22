<?php

namespace App\Http\Controllers;

use App\Models\{
    Company,
    Freela,
    Invite,
    User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StarRatingController extends Controller
{

    protected $invite;
    protected $freela;
    protected $company;
    protected $user;

    public function __construct(Invite $invite, Freela $freela, Company $company, User $user)
    {
        $this->invite = $invite;
        $this->freela = $freela;
        $this->company = $company;
        $this->user = $user;
    }

    public function edit($id)
    {
        $maneger = $this->company->where('user_id', Auth::id())->first();
        $invite = $this->invite->where('company_id', $maneger->id)->first();
        return view('starRating.create-starRating', compact('inviteUser'));
    }

    public function store(Request $request)
    {
        $maneger = $this->company->where('user_id', Auth::id())->first();
        $invite = $this->invite->where('company_id', $maneger->id)->first();
        dd($invite);
        $invite->user->rating()->create($request->all());
    }


}
