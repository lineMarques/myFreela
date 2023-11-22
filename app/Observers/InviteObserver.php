<?php

namespace App\Observers;

use App\Models\Invite;

class InviteObserver
{
    /**
     * Handle the Invite "created" event.
     *
     * @param  \App\Models\Invite  $invite
     * @return void
     */
    public function created(Invite $invite)
    {

    }

    /**
     * Handle the Invite "updated" event.
     *
     * @param  \App\Models\Invite  $invite
     * @return void
     */
    public function updated(Invite $invite)
    {
        //
    }

    /**
     * Handle the Invite "deleted" event.
     *
     * @param  \App\Models\Invite  $invite
     * @return void
     */
    public function deleted(Invite $invite)
    {
        //
    }

    /**
     * Handle the Invite "restored" event.
     *
     * @param  \App\Models\Invite  $invite
     * @return void
     */
    public function restored(Invite $invite)
    {
        //
    }

    /**
     * Handle the Invite "force deleted" event.
     *
     * @param  \App\Models\Invite  $invite
     * @return void
     */
    public function forceDeleted(Invite $invite)
    {
        //
    }
}
