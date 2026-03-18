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

                    $callerNumber = isset($record['Caller Number']) ? $record['Caller Number'] : 'Unknown';
                    $callerId = isset($record['Caller ID']) ? $record['Caller ID'] : 'Unknown';
                    $callStatus = isset($record['Call Status']) ? $record['Call Status'] : 'Unknown';
                    $startTime = isset($record['Start Time']) ? $record['Start Time'] : 'Unknown';
                    $endTime = isset($record['End Time']) ? $record['End Time'] : 'Unknown';

                    // create and store record
                    CDRRecord::create([
                        'caller_number' => $callerNumber,
                        'caller_id' => $callerId,
                        'call_status' => $callStatus,
                        'start_time' => $startTime,
                        'end_time' => $endTime,
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
     * compare two files and return duplicate rows as a collection of strings
     * @param string $file1
     * @param string $file2
     * @return Collection<string, string>
     */
    static public function find_duplicate_rows(string $file1, string $file2): Collection
    {
        $duplicates = new Collection();

        $duplicates->add([]);
        return $duplicates;
    }

}