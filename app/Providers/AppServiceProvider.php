<?php

namespace App\Providers;

use App\Models\CDRRecord;
use App\Observers\CDRRecordObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        CDRRecord::observe(CDRRecordObserver::class);
    }
}
