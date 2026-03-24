<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Parser;
use App\Helpers\FileParser;

class ParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse_file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the programs parser to go through call records';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->comment('Starting the parser..');
        $records = FileParser::parse_file();

        if($records->isEmpty()) return self::FAILURE;
        $this->info("Success File Found! Total Records: " . $records->count());

        $this->output->progressStart($records->count());
        foreach ($records as $record):
            $this->output->progressAdvance();
            usleep(50000);
        endforeach;
        $this->output->progressFinish();

        $this->info("Sucess added: " . $records->count() . " records to the database");

    }
}
