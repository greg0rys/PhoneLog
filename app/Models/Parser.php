<?php

/**
 * Designed to be a static helper class to parse the CDR file and store them. 
 */

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

    /**
     * Parses the file and creates CDRRecord objects
     * @return void
     */
    static public function parse_file(): bool
    {
        // parse the cdr file.
        $file = storage_path("storage/public/records");
        if (($handle = fopen($file, "r")) !== FALSE) {

            // Get the headers from the first row
            $headers = fgetcsv($handle, 10000, ",");

            if ($headers === FALSE) {
                die("Error: Could not read headers from the file.\n");
            }

            // 3. Loop through the rest of the rows in the CSV
            while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {

                // Ensure the row matches the header count to avoid array alignment errors
                if (count($headers) === count($row)) {
                    // Combine headers with the row data
                    $record = array_combine($headers, $row);

                    $callerId = isset($record['Caller ID']) ? $record['Caller ID'] : 'Unknown';
                    $callerName = isset($record['Caller Name']) ? $record['Caller Name'] : 'Unknown';
                    $callerNumber = isset($record['Caller Number']) ? $record['Caller Number'] : 'Unknown';
                    $startTime = isset($record['Start Time']) ? $record['Start Time'] : 'Unknown';
                    $callStatus = isset($record['Call Status']) ? $record['Call Status'] : 'Unknown';

                    CDRRecord::create([
                        'Caller ID' => $callerId,
                        'Caller Name' => $callerName,
                        'Caller Number' => $callerNumber,
                        'Start Time' => $startTime,
                        'Call Status' => $callStatus
                    ]);
                }
            }

            // Close the file now that we are done reading it
            fclose($handle);

        } else {
            return false;
        }

        return true; // if we made it here, the file has been parsed. 
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
