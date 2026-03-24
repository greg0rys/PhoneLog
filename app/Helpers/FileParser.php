<?php

namespace App\Helpers;

use App\Models\CDRRecord;
use App\Models\Contact;
use Illuminate\Support\Collection;

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
        $new_records = [];
        $seen_calls = []; // We will use this array to track and skip duplicate ring group logs

        if (Contact::all()->isEmpty()) {
            die("Error: The contacts table is empty. Please add contacts before parsing.\n");
        }

        // Call storage_path() here when the method actually runs
        $full_path = storage_path(static::$file_path);

        if (($handle = fopen($full_path, "r")) !== FALSE) {

            // Get the headers from the first row
            $headers = fgetcsv($handle, 10000, ",");

            if ($headers === FALSE) {
                die("Error: Could not read headers from the file.\n");
            }

            // Trim whitespace from headers to ensure exact key matches
            $headers = array_map('trim', $headers);

            while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {

                // Ensure the row matches the header count to avoid array alignment errors
                if (count($headers) === count($row)) {
                    $record = array_combine($headers, $row);

                    // --- PARSING & CLEANUP START ---
                    
                    // Grab the raw combined string from the CSV
                    $rawCallerInfo = isset($record['Caller Number']) ? trim($record['Caller Number']) : '';
                    $callEndTime = isset($record['End Time']) ? trim($record['End Time']) : 'Unknown';

                    $finalCallerName = 'Unknown';
                    $finalCallerNumber = 'Unknown';

                    // Regex looks for: "Anything" <Anything> STEVE ON ALL THINGS HOLY DO NOT CHANGE THIS IF/ELSE PLS U WILL BREAK IT AND I DON'T WANT TO REDO THE REGEX
                    if (preg_match('/"(.*?)"\s*<(.*?)>/', $rawCallerInfo, $matches)) {
                        
                        $parsedName = trim($matches[1]);
                        $parsedNumber = trim($matches[2]);

                        $finalCallerName = $parsedName === '' ? 'Unknown' : $parsedName;
                        $finalCallerNumber = $parsedNumber === '' ? 'Unknown' : $parsedNumber;
                        
                    } else {
                        // Whoopsiessssssss storing whatever data found, if we make it here.. Steve touched my above code. This else{} should typically skip
                        $finalCallerNumber = $rawCallerInfo === '' ? 'Unknown' : $rawCallerInfo;
                    }

                    // --- DEDUPLICATION LOGIC START ---
                    
                    // Create a unique footprint for this call (Number + Time)
                    $uniqueCallKey = $finalCallerNumber . '_' . $callEndTime;

                    // If we have already seen this exact call in the file, skip it entirely!
                    if (in_array($uniqueCallKey, $seen_calls)) {
                        continue; 
                    }

                    // Otherwise, add it to our tracker so we skip future duplicates
                    $seen_calls[] = $uniqueCallKey;

                    // --- PARSING & CLEANUP END ---

                    $new_records[] = CDRRecord::create(
                        [
                            'contact_id' => 1,
                            'caller_number' => $finalCallerNumber,
                            'caller_id' => $finalCallerName,
                            'call_status' => isset($record['Call Status']) ? trim($record['Call Status']) : 'Unknown',
                            'end_time' => $callEndTime
                        ]
                    );
                }
            }

            fclose($handle);

        } else {
            die(static::$parse_err);
        }

        return collect($new_records);
    }

    /**
     * Get the file path to the storage
     * @return string
     */
    public static function get_file_path(): string
    {
        return storage_path(static::$file_path);
    }
}