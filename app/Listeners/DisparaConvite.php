<?php

namespace App\Listeners;

use App\Events\EventoConvite;
use App\Mail\InviteFreelancers;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class DisparaConvite
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $user;


    public function __construct(User $user)
    {

        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventoConvite  $event
     * @return void
     */
    public function handle(EventoConvite $event)
    {

        $listaFuncionarios = getFreelancer($event->freela->cargo);

        $listaFuncionarios->each(function ($funcionario) {
            $funcionario = $this->user->where('id', $funcionario->ratingablle_id)->first();
            Mail::to($funcionario)->send(new InviteFreelancers($funcionario->email));
        });

        dd($listaFuncionarios);

        return $listaFuncionarios;
    }
}
