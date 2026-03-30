<?php
use App\Mail\ContactSubmission;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use App\Models\Contact;
use App\Models\ContactForm;

// test to make sure we ca get the last ticket number to assign to new submissions
it('can get the last ticket number to attach to message body', function () {
    $contacts = Contact::factory(10)->create();
    $red = Redis::connection('db3');
    $contacts->each(function ($contact) use($red) {
        ContactForm::factory()->create([
            'contact_id' => $contact->id,
            'ticket_number' => $red->incr('global_ticket_counter'),
        ]);
    });


    expect($contacts->get(1))->toEqual($red->get('global_ticket_counter'));
});

it('can get the latest ticket num')