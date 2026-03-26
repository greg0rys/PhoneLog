<?php

/**
 * Designed to be a static helper class to parse the CDR file and store them.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parser query()
 *
 * @mixin \Eloquent
 */
class Parser extends Model
{
    /**
     * Parses the file and creates CDRRecord objects
     */
    public static function parse_file(): bool
    {
        // parse the cdr file.
        $file = storage_path('app/public/records/record.csv');
        $count = 0;
        if (($handle = fopen($file, 'r')) !== false)
        {

            // Get the headers from the first row
            $headers = fgetcsv($handle, 10000, ',');

            if ($headers === false)
            {
                exit("Error: Could not read headers from the file.\n");
            }

            // Trim whitespace from headers to ensure exact key matches for array_combine
            $headers = array_map('trim', $headers);

            while (($row = fgetcsv($handle, 10000, ',')) !== false)
            {

                // Ensure the row matches the header count to avoid array alignment errors
                if (count($headers) === count($row))
                {
                    $record = array_combine($headers, $row);

                    // // create and store record
                    // CDRRecord::create([
                    //     'caller_number' => isset($record['Caller Number']) ? $record['Caller Number'] : 'Unknown',
                    //     'caller_id' => isset($record['Caller ID']) ? $record['Caller ID'] : 'Unknown',
                    //     'call_status' => isset($record['Call Status']) ? $record['Call Status'] : 'Unknown',
                    //     'start_time' => isset($record['Start Time']) ? $record['Start Time'] : 'Unknown',
                    //     'end_time' => isset($record['End Time']) ? $record['End Time'] : 'Unknown',
                    // ]);

                    $new_record = CDRRecord::firstOrCreate(
                        // Argument 1: Search Condition (Only ONE set of brackets!)
                        ['start_time' => $record['Start Time']],

                        // Argument 2: Creation Values (Only ONE set of brackets!)
                        [
                            'contact_id' => Contact::all()->random()->id,
                            'caller_number' => isset($record['Caller Number']) ? $record['Caller Number'] : 'Unknown',
                            'caller_id' => isset($record['Caller ID']) ? $record['Caller ID'] : 'Unknown',
                            'call_status' => isset($record['Call Status']) ? $record['Call Status'] : 'Unknown',
                            'end_time' => isset($record['End Time']) ? $record['End Time'] : 'Unknown',
                        ]
                    );

                    $user = Contact::where('caller_number', $new_record->caller_number);
                    if ($user->count() != 0)
                    {
                        $user->call_records()->create([
                            'user_id' => $user->id,
                            'call_id' => $new_record->id,
                        ]);

                        echo "Success call assoicated. \n";
                    } else
                    {

                    }

                    $count++;

                }
            }

            echo "Created $count new records";
            fclose($handle);

        } else
        {
            return false;
        }

        return true;
    }

    public static function associate_calls($calls, User $user): bool
    {
        foreach ($calls as $call)
        {
            if ($call['Caller Number'] == $user->caller_number)
            {
                return false;
            }
        }

        return true; // we made it
    }
}
