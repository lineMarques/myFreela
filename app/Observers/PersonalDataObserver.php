<?php

namespace App\Observers;

use App\Models\PersonalData;

class PersonalDataObserver
{
    /**
     * Handle the PersonalData "created" event.
     *
     * @param  \App\Models\PersonalData  $personalData
     * @return void
     */
    public function created(PersonalData $personalData)
    {
        //
    }

    /**
     * Handle the PersonalData "updated" event.
     *
     * @param  \App\Models\PersonalData  $personalData
     * @return void
     */
    public function updated(PersonalData $personalData)
    {
        //
    }

    /**
     * Handle the PersonalData "deleted" event.
     *
     * @param  \App\Models\PersonalData  $personalData
     * @return void
     */
    public function deleted(PersonalData $personalData)
    {
        //
    }

    /**
     * Handle the PersonalData "restored" event.
     *
     * @param  \App\Models\PersonalData  $personalData
     * @return void
     */
    public function restored(PersonalData $personalData)
    {
        //
    }

    /**
     * Handle the PersonalData "force deleted" event.
     *
     * @param  \App\Models\PersonalData  $personalData
     * @return void
     */
    public function forceDeleted(PersonalData $personalData)
    {
        //
    }
}
