<?php

/**
 * Designed to be a static helper class to parse the CDR file and store them. 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CDRRecord;
use Illuminate\Support\Collection;

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
     * @return bool
     */
    static public function parse_file(): bool
    {
        // parse the cdr file.
        $file = storage_path("app/public/records/record.csv");
        if (($handle = fopen($file, "r")) !== FALSE) {

            // Get the headers from the first row
            $headers = fgetcsv($handle, 10000, ",");

            if ($headers === FALSE) {
                die("Error: Could not read headers from the file.\n");
            }

            // Trim whitespace from headers to ensure exact key matches for array_combine
            $headers = array_map('trim', $headers);

            while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {

                // Ensure the row matches the header count to avoid array alignment errors
                if (count($headers) === count($row)) {
                    $record = array_combine($headers, $row);

                    // create and store record
                    CDRRecord::create([
                        'caller_number' => isset($record['Caller Number']) ? $record['Caller Number'] : 'Unknown',
                        'caller_id' => isset($record['Caller ID']) ? $record['Caller ID'] : 'Unknown',
                        'call_status' => isset($record['Call Status']) ? $record['Call Status'] : 'Unknown',
                        'start_time' => isset($record['Start Time']) ? $record['Start Time'] : 'Unknown',
                        'end_time' => isset($record['End Time']) ? $record['End Time'] : 'Unknown',
                    ]);
                }
            }

            fclose($handle);

        } else {
            return false;
        }

        return true;
    }

    /**
     * compare to files to avoid processing old files / duplicate entries for a given day.
     * @param string $file1
     * @param string $file2
     * @return Collection<string, string>
     */
    static public function find_duplicate_rows(string $path_one, string $path_two): Collection
    {
        $duplicates = collect([]); // hold the array of duplicate CDRRecord models

        return $duplicates;
    }

}