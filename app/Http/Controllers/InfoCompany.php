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

class InfoCompany extends Controller
{
    protected $invite;
    protected $company;
    protected $user;
    protected $freela;

    public function __construct(Invite $invite, Company $company, User $user, Freela $freela)
    {
        $this->invite = $invite;
        $this->company = $company;
        $this->user = $user;
        $this->freela = $freela;
    }

    public function show(){

        $user = Auth::user();
        $invite = $this->invite->where('user_id', $user->id)
                                ->where('confirmacao', 'Confirmada')
                                ->get();

                        
        $freela = $this->freela->where('id', $invite[0]->freela_id )->first();
        $company = $this->company->where('id', $invite[0]->company_id)->first();
        return view('invite.infoCompany', compact('company', 'user', 'freela'));
    }
}
