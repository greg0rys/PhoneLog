__3/17/2026__

    * new changes to the plug
    * blocked out CDR junk
    * Added search_by_name() method to CDRRecordController.php
    * removed the parse method from the cdr record controller in favor of the Parser helper class
    * renamed search() to search_by_number()
    * added search_by_date()
    * added upload-csv view to allow the upload of CSV files manually
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

    Route::resource('upload-csv', CDRRecordController::class);

