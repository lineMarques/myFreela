<?php

namespace App\Http\Controllers;

use App\Enums\InviteStatus;
use App\Models\{
    Freela,
    Invite,
    User
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class InviteController extends Controller
{
    protected $funcionario;
    protected $freela;
    protected $invite;


    public function __construct(User $funcionario, Freela $freela, Invite $invite)
    {
        $this->funcionario = $funcionario;
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
        $funcionario = $this->funcionario->find(Auth::id()); //query
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
        /*  $user = $this->user->find(Auth::id());
        $invite = $this->invite->where('user_id', $user->id)->first();
        return view('invite.create-invite', compact('user', 'invite')); */
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invite = $this->invite;
        $query = DB::table('invites')
            ->join('users', 'invites.user_id', '=', 'users.id')
            ->get();

        if ($query->all() == null) {

            $invite->create($request->all());

        } else {
            
            return view('invite.erro-invite')->with('status', 'erroTrue');
        }

        return Redirect::route('dashboard', compact('invite'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
