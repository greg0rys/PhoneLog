<?php

namespace App\Observers;

use App\Models\Contact;

class ContactObserver
{
    public function saving(Contact $contact): void {}

    /**
     * Handle the contact "created" event.
     */
    public function created(Contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "updated" event.
     */
    public function updated(Contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "deleted" event.
     */
    public function deleted(Contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "restored" event.
     */
    public function restored(Contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "force deleted" event.
     */
    public function forceDeleted(Contact $contact): void
    {
        //
    }
}
