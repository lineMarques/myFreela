<?php

namespace App\Http\Controllers;

use App\Models\{
    Freela,
    Invite,
    starRating,
    User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StarRatingController extends Controller
{

    protected $invite;
    public $user;
    protected $starRating;
    protected $freela;

    public function __construct(Invite $invite, User $user, starRating $starRating, Freela $freela)
    {
        $this->invite = $invite;
        $this->user = $user;
        $this->starRating = $starRating;
        $this->freela = $freela;
    }

    public function show()
    {
        $this->user = $this->user->where('id', Auth::id())->first();
        $invites = $this->invite->where('company_id',$this->user->company->id)
            ->where('confirmacao', 'Encerrada')
            ->orWhere('confirmacao', 'Confirmada')
            ->get();

        $maneger = $this->user->where('id', Auth::id())->first();
        $freelancers = $invites->map(function ($invite) {
            $freelancers =  $this->user->where('users.id', $invite->user_id)->get();
            $freelas = $this->freela->where('id', $invite->freela_id)->get();
            return [$freelancers, $freelas];
        });

        $starRating = $this->starRating->all();

        return view('starRating.show-starRating', compact('freelancers', 'invites', 'starRating', 'maneger'));
    }

    public function edit($id)
    {
        $maneger = $this->user->where('id', Auth::id())->first();
        $invite = $this->invite->where('id', $id)->first();
        $user = $this->user->where('id', $invite->user_id)->first();
        return view('starRating.create-starRating', compact('invite', 'user', 'maneger'));
    }

    public function store(Request $request)
    {

        $user = $this->user->where('id', $request->user_id)->first();
        $user->rating()->create([
            'evaluator_user_id' => $request->evaluator_user_id,
            'star' => $request->star,
            'reviwe' => $request->reviwe,
        ]);

        return Redirect('dashboard');
    }
}
