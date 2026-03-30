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
$y->set('global_ticket_counter', 10);

echo "Got admin_name: " . $y->get('admin_name') . " from Redis key store\n";



