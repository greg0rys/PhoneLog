<?php

namespace App\Observers;

use App\Models\CDRRecord;

class CDRRecordObserver
{
    public function saving(CDRRecord $cdr)
    {
        // validate at save this fires before created
        
    }
    /**
     * Handle the CDRRecord "created" event.
     */
    public function created(CDRRecord $cdr): void
    {
        //
    }

    /**
     * Handle the CDRRecord "updated" event.
     */
    public function updated(CDRRecord $cdr): void
    {
        //
    }

    /**
     * Handle the CDRRecord "deleted" event.
     */
    public function deleted(CDRRecord $cdr): void
    {
        //
    }

    /**
     * Handle the CDRRecord "restored" event.
     */
    public function restored(CDRRecord $cdr): void
    {
        //
    }

    /**
     * Handle the CDRRecord "force deleted" event.
     */
    public function forceDeleted(CDRRecord $cdr): void
    {
        //
    }
}
