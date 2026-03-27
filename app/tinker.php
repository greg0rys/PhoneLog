<?php

use App\Helpers\FileParser;
use App\Models\CDRRecord;
use App\Models\Contact;


$records = FileParser::parse_file();
echo "Added: " . $records->count() . " new records\n";

foreach ($records as $cc)
    echo $cc->start_time . "\n";

