<?php

namespace App\Http\Controllers;

use App\Enums\InviteStatus;
use App\Events\EventoConvite;
use App\Models\{
    Freela,
    Invite,
    User
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Object_;
use SebastianBergmann\Type\ObjectType;
use stdClass;
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

    /*  public function index()
        {
            $user = $this->user->find(Auth::id());
            $freela = $user->company->freelas;
            return view('da', compact('funcionario', 'freela'));
        } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($freelaId)
    {
        $freela = $this->freela->where('id', $freelaId)->first();
        EventoConvite::dispatch($freela);
        return Redirect::route('dashboard')->with('status', 'invite-created');;
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
