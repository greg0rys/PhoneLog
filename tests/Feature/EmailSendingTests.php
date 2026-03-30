<?php
use App\Mail\ContactSubmission;
use Illuminate\Support\Facades\Mail;

use App\Models\Contact;
use App\Models\ContactForm;

// test to make sure we ca get the last ticket number to assign to new submissions
it('can get the last ticket number to attach to message body', function () {
    $contacts = Contact::factory(10)->create();

    $contacts->each(function ($contact) {
        ContactForm::factory()->create([
            'contact_id' => $contact->id,
            'ticket_number' => 'TCK-' . rand(1000, 9999)
        ]);
    });


    expect(ContactForm::max('ticket_number'))->not->toBeNull();
});


it('can send the welcome email', function(){
    Mail::fake(); // create a fake email for mocking

    Mail::to('greg@shenefelt.org')->send(new ContactSubmission('Greg', '12345'));

    Mail::assertQueued(ContactSubmission::class, function ($mail) {
        return $mail->hasTo('greg@shenefelt.org');
    });
});

it('can be queued for dispatch', function(){
    
});
