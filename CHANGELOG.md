__3/17/2026__

    * new changes to the plug
    * blocked out CDR junk
    * Added search_by_name() method to CDRRecordController.php
```php
<?php
    public function search_by_name(CDRRecord $cdrRecord): CDRRecord
    {
        return CDRRecord::where('caller_name', $cdrRecord->caller_name) ?? null;
    }

