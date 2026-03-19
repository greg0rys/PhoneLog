<?php

namespace App\Observers;

use App\Models\contact;

class ContactObserver
{
    public function saving(contact $contact): void
    {
        
    }    
    /**
     * Handle the contact "created" event.
     */
    public function created(contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "updated" event.
     */
    public function updated(contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "deleted" event.
     */
    public function deleted(contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "restored" event.
     */
    public function restored(contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "force deleted" event.
     */
    public function forceDeleted(contact $contact): void
    {
        //
    }
}
