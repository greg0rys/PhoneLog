<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CDRRecord;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parser query()
 * @mixin \Eloquent
 */
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
        // parse the cdr file.
        $file = storage_path("storage/public/records");
        
    }

    /**
     * Get the results of the parse, returned as an array of record objects
     * @return array
     */
    static public function get_results(): array
    {
        return [];
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
