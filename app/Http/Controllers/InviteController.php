<?php

namespace App\Http\Controllers;

use App\Models\{
    Freela,
    Invite,
    User
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    public function create($freelaId)
    {
        $freela = $this->freela->where('id', $freelaId)->first();
        $funcionario = $this->user->find(Auth::id()); //query
        return view('invite.create-invite', compact('funcionario', 'freela'));
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
        $invite = $this->invite->where('user_id', $user->id)->first();
        return view('invite.create-invite', compact('user', 'invite'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invite = $this->invite->create([
            'user_id' => $request['user_id'],
            'company_id' =>  $request['company_id'],
            'confirmacao' => $request['confirmacao'],
        ]);

        return Redirect::route('dashboard', compact('invite'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
