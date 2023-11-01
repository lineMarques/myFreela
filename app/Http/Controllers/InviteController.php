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

    public function create()
    {
        $user = $this->user->find(Auth::id());

        if ($user->typeUser == 'freelancer') {

            $invites = $this->invite->where('user_id', $user->id);
            $invites = $invites->orderBy('created_at', 'DESC')->paginate(10);
            return view('livewire.dashboard0', compact('invites'));
        }
    }

    public function show($id)
    {
        $user = $this->user->find(Auth::id());
        $invite = $this->invite->where('id', $id)->first();
        return view('invite.partials.show-invite', compact('user', 'invite'));
    }

    public function update(Request $request)
    {
        $invite = $this->invite->where('id', $request->id)->first();
        $invite->update([
            'confirmacao' => true,
        ]);
        return Redirect::route('dashboard');
    }

    public function destroy($id){

        $invite = $this->invite->find($id);
        $invite->delete();
        return Redirect::route('dashboard');
    }
}
