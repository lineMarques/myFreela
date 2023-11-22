<?php

namespace App\Http\Controllers;

use App\Mail\InfoFreelancers;
use App\Models\{
    Company,
    Freela,
    Invite,
    User
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class InviteController extends Controller
{
    protected $user;
    protected $freela;
    protected $invite;
    protected $company;
    public  $inviteUser;

    public function __construct(User $user, Freela $freela, Invite $invite, Company $company)
    {
        $this->user = $user;
        $this->freela = $freela;
        $this->invite = $invite;
        $this->company = $company;
    }

    public function create()
    {
        $user = $this->user->find(Auth::id());

        if ($user->typeUser == 'freelancer') {
            $invites = $this->invite->where('user_id', $user->id);
            $invites = $invites->orderBy('created_at', 'DESC')->paginate(10);
            return view('livewire.dashboard', compact('invites'));
        } else {
            return view('livewire.dashboard');
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

        $this->inviteUser = $this->invite->where('id', $request->id)->first();

        $invites = $this->invite->where('freela_id', $request->freela_id)->get();

        $preenchida =  $invites->filter(function ($confirmado) {
            return $confirmado->confirmacao == true;
        });

        $this->inviteUser;

        if (sizeof($preenchida) == 0) {

            $this->inviteUser->update([
                'confirmacao' => true,
            ]);

            $company  = $this->company->where('id', $this->inviteUser->company->id)->first();
            $manager = $this->user->where('id', $company->user_id)->first();
            Mail::to($manager)->send(new InfoFreelancers($manager->email));
            return Redirect::route('dashboard.freelancer');

        }else{
            dd('A vaga ja foi Preenchida');
        };

    }

    public function destroy($id)
    {

        $invite = $this->invite->find($id);
        $invite->delete();
        return Redirect::route('dashboard');
    }
}
