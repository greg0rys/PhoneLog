<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CDRRecord;

class Parser extends Model
{
    protected $results = []; // store parsed record objects
    //

    /**
     * Loads the cdr csv in from app/storage
     * @return void
     */
    public function load_file(): bool
    {
        return false;
    }

    /**
     * Parses the file and creates CDRRecord objects
     * @return void
     */
    static public function parse_file(): void
    {
        $this->results[] = CDRRecord::create([

        ]);
    }

    /**
     * Get the results of the parse, returned as an array of record objects
     * @return array
     */
    static public function get_results(): array
    {
        return $this->results;
    }

    /**
     * App Storage || lest || 
     * @return bool
     */
    static public function search_file(): bool
    {
        return false;
    }
}
