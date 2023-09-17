<?php

namespace App\Http\Controllers;

use App\Models\{
    Freela,
    Invite,
    User
};

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class InviteController extends Controller
{
    protected $user;
    protected $freela;
    protected $invite;

    public function __construct(User $user, Freela $freela, Invite $invite)
    {
        $this->user = $user;
        $this->freela = $freela;
        $this->invite = $invite;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->user->first();
        $freela = $this->freela->first();
        return view('invite.create-invite', compact('freela','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*   $user = $this->user;
        $freela = $this->freela->company_id;

        dd($freela);  */
        $invite = $this->invite->create([
            'user_id' => $request['user_id'],
            'company_id' =>  $request['company_id'],
            'confirmacao'=> true,
        ]);

        return view('livewire.dashboard', compact('invite'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
