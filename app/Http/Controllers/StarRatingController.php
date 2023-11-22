<?php

namespace App\Http\Controllers;

use App\Models\{
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
    protected $user;
    protected $starRating;

    public function __construct(Invite $invite, User $user, starRating $starRating)
    {
        $this->invite = $invite;
        $this->user = $user;
        $this->starRating = $starRating;
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
