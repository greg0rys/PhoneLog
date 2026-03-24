<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RecordSearchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:search_record';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search CDR entries for a given input';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }

    public function process_input(): void
    {
        
    }
}
