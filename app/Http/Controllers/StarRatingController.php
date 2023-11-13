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

    public function __construct(Invite $invite, Freela $freela)
    {
        $this->invite = $invite;
        $this->freela = $freela;
    }

    public function create()
    {
        $inviteUser = $this->invite->where('user_id', Auth::id())->first();
        return view('starRating.create-starRating', compact('inviteUser'));
    }

    public function store(Request $request)
    {
        $inviteUser = $this->invite->where('user_id', Auth::id())->first();
        $inviteUser->user->rating()->create($request->all());
    }


    public function show($id)
    {
        //
    }
}
