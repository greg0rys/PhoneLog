__3/17/2026__

    * new changes to the plug
    * blocked out CDR junk
    * Added search_by_name() method to CDRRecordController.php
    * removed the parse method from the cdr record controller in favor of the Parser helper class
    * renamed search() to search_by_number()
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

