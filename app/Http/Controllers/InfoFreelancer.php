<?php

namespace App\Http\Controllers;

use App\Models\{
    Company,
    Invite,
    User,
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoFreelancer extends Controller
{
    protected $invite;
    protected $company;
    protected $user;

    public function __construct(Invite $invite, Company $company, User $user)
    {
        $this->invite = $invite;
        $this->company = $company;
        $this->user = $user;
    }

    public function show(){

        $company = Auth::user()->company;
        $invite = $this->invite->where('company_id', $company->id)
                                ->where('confirmacao', true)
                                ->get();

        $freelancer = $this->user->where('id', $invite[0]->user_id)->first();
        return view('company.infoFreelancer', compact('freelancer'));
    }
}

