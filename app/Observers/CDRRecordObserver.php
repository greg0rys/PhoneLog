<?php

namespace App\Observers;

use App\Models\CDRRecord;

class CDRRecordObserver
{
    /**
     * Handle the CDRRecord "created" event.
     */
    public function created(CDRRecord $cDRRecord): void
    {
        //
    }

    /**
     * Handle the CDRRecord "updated" event.
     */
    public function updated(CDRRecord $cDRRecord): void
    {
        //
    }

    /**
     * Handle the CDRRecord "deleted" event.
     */
    public function deleted(CDRRecord $cDRRecord): void
    {
        //
    }

    /**
     * Handle the CDRRecord "restored" event.
     */
    public function restored(CDRRecord $cDRRecord): void
    {
        //
    }

    /**
     * Handle the CDRRecord "force deleted" event.
     */
    public function forceDeleted(CDRRecord $cDRRecord): void
    {
        //
    }
}
