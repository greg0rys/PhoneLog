__3/17/2026__

    * new changes to the plug
    * blocked out CDR junk
    * Added search_by_name() method to CDRRecordController.php
    * removed the parse method from the cdr record controller in favor of the Parser helper class
    * renamed search() to search_by_number()
    * added search_by_date()
    * added upload-csv view to allow the upload of CSV files manually
    * Set up CSV Parsing method parse_file() in App\Models\Parser
```php
<?php
    
    public function search_by_name(CDRRecord $cdrRecord): CDRRecord
    {
        return CDRRecord::where('caller_name', $cdrRecord->caller_name) ?? null;
    }

    public function search_by_number(CDRRecord $cDRRecord)
    {
        $all = CDRRecord::where('caller_number', $cDRRecord->caller_number)->get();
        return view('record.search', ['results' => $all]);
    }


    public function search_by_date(CDRRecord $cDRRecord): CDRRecord
    {
    
        return CDRRecord::where('call_date', $cDRRecord->call_date);
    }

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

            while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {

                if (count($headers) === count($row)) {
                    // Combine headers with the row data
                    $record = array_combine($headers, $row);

                    $callerId = isset($record['Caller ID']) ? $record['Caller ID'] : 'Unknown';
                    $callerName = isset($record['Caller Name']) ? $record['Caller Name'] : 'Unknown';
                    $callerNumber = isset($record['Caller Number']) ? $record['Caller Number'] : 'Unknown';
                    $startTime = isset($record['Start Time']) ? $record['Start Time'] : 'Unknown';
                    $callStatus = isset($record['Call Status']) ? $record['Call Status'] : 'Unknown';

                    // create the CDRRecord object
                    CDRRecord::create([
                        'Caller ID' => $callerId,
                        'Caller Name' => $callerName,
                        'Caller Number' => $callerNumber,
                        'Start Time' => $startTime,
                        'Call Status' => $callStatus
                    ]);
                }
            }

            // fin
            fclose($handle);

        } else {
            return false;
        }

        return true; // if we made it here, the file has been parsed. 
    }

    Route::resource('upload-csv', CDRRecordController::class);
```

# 03.19.26
* created CallHistory Model 
* created Contact Model

# 03.27.26
* Complete refactor of Helpers/FileParser.php

# 03.30.26
* Redis implementaions:
    * global_ticket_counter - holds latest ticket number
    * Used for queue jobs suchs as sending emails
```php
use Illuminate\Support\Facades\Redis;
/* this also increments the current counter value */
Redis::connection('db3')->incr('global_ticket_counter');
```
* Made updates to the routes/console.php to include a scheduled command to work the job of emails.
```php
use Illuminate\Support\Facades\Schedule;
/* run the queue every one minute and stop running when empty */
Schedule::command('queue:work --stop-when-empty')->everyMinute();
```