<?php

use App\Helpers\FileParser;
use App\Models\CDRRecord;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSubmission;

Mail::to('greg@shenefelt.org')->send(new ContactSubmission('John Doe'));



$records = FileParser::parse_file();
echo "Added: " . $records->count() . " new records\n";

foreach ($records as $cc)
    echo $cc->start_time . "\n";


$query = "Greg";


