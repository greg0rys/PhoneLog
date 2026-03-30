<?php

namespace App\Helpers;

use App\Models\CDRRecord;
use App\Models\Contact;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class FileParser
{
    // Store only the relative string here to avoid the "Constant expression" error
    private static string $file_path = "app/public/records/record.csv";
    private static string $parse_err = "Unknown Error Occured!";

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public static function parse_file(): Collection
    {
        $new_records = collect();
        $collection_counter = 0;

        // always make sure there is at least one contact in the db
        if(Contact::all()->isEmpty())
            Contact::factory()->create();

        $contact_ids = collect(Contact::pluck("id"));

        // Call storage_path() here when the method actually runs
        $full_path = storage_path(static::$file_path);

        if (($handle = fopen($full_path, "r")) !== FALSE) {

            // Get the headers from the first row
            $headers = fgetcsv($handle, 10000, ",");

            if (!$headers) {
                die("Error: Could not read headers from the file.\n");
            }

            // be gone whitespace! 
            $headers = array_map('trim', $headers);

            while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {

                // make sure we have the same number of rows as headers.
                if (count($headers) === count($row)) {
                    $record = array_combine($headers, $row);


                    $rawCallerInfo = isset($record['Caller Number']) ? trim($record['Caller Number']) : '';
                    $call_end = isset($record['End Time']) ? trim($record['End Time']) : 'Unknown';
                    $call_start = isset($record['Start Time']) ? trim($record['Start Time']) : 'Unknown';
                    $caller_name = 'Unknown';
                    $caller_number = 'Unknown';
                    $call_status = isset($record['Call Status']) ? trim($record['Call Status']) : 'Unknown';

                    // looks for anything: "Anything" <Anything> STEVE ON ALL THINGS HOLY DO NOT CHANGE THIS IF/ELSE PLS U WILL BREAK IT AND I DON'T WANT TO REDO THE REGEX
                    if (preg_match('/"(.*?)"\s*<(.*?)>/', $rawCallerInfo, $matches)) {

                        $parsedName = trim($matches[1]);
                        $parsedNumber = trim($matches[2]);

                        $caller_name = $parsedName === '' ? 'Unknown' : $parsedName;
                        $caller_number = $parsedNumber === '' ? 'Unknown' : $parsedNumber;

                    } else {
                        // Whoopsiessssssss storing whatever data found, if we make it here.. Steve touched my above code. This else{} should typically skip
                        $caller_number = $rawCallerInfo === '' ? 'Unknown' : $rawCallerInfo;
                    }

                    /**  Parse the times of the calls to drop the seconds off them. If not then we will end up with duplicate cals*/
                     
                    $call_start = Carbon::parse($call_start)->format('Y-m-d H:i');
                    $call_end = Carbon::parse($call_end)->format('Y-m-d H:i');

                
                    // safely push a new CDRRecord into the collection
                    $new_records->push(CDRRecord::create(
                        [
                            'contact_id' => $contact_ids->random(),
                            'caller_number' => $caller_number,
                            'caller_id' => $caller_name,
                            'call_status' => $call_status,
                            'start_time' => $call_start,
                            'end_time' => $call_end,
                        ]
                    ));
                    


                }
            }

            fclose($handle);

        } else {
            die(static::$parse_err);
        }

        $filtered_recs = $new_records->unique('start_time');
        static::output_parse_status($filtered_recs->count());
        return $filtered_recs; // filter out the duplicate start times
    }

    /**
     * Get the file path to the storage
     * @return string
     */
    public static function get_file_path(): string
    {
        return storage_path(static::$file_path);
    }

    public static function output_parse_status(int $count = 0): void
    {
        echo ($count > 0) ? "Added $count new records to the db\n":'No records added \n';
    }

}