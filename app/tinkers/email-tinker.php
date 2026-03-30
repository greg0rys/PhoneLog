<?php
use App\Helpers\FileParser;
use App\Jobs\EmailDispatch;
use App\Mail\EmailAlert;
use App\Models\CDRRecord;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSubmission;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Redis;




EmailDispatch::dispatch("greg@shenefelt.org", fake()->text(), "contact submission", fake()->name());

$y = Redis::connection('db3');

echo "Got admin_name: " . $y->get('admin_name') . " from Redis key store\n";
echo "Highest ticket number in Redis key store is: {$y->get('global_ticket_counter')}\n";



