<?php

use Illuminate\Support\Facades\Redis;
use App\Models\ContactForm;


it('can create and update the submission with a ticket number', function(){
    $contact = ContactForm::factory()->create([
        'ticket_number' => Redis::connection('db3')->incr('global_ticket_counter')
    ]);

    $curr = Redis::connection()->get('global_ticket_counter');

    expect($curr)->toEqual($contact->ticket_number);
});