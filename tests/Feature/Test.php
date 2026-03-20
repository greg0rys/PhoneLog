<?php
use App\Models\CDRRecord;
use App\Models\Contact;


test("it can create a new contact", function()
{
    $contact = Contact::factory(1)->create([
        "name" => "Gregory Shenefelt",
        "phone_number" => "503-330-1866",
    ])->first();

    expect($contact->name)->toBe("Gregory Shenefelt");
});

test("new record", function () {
    // 1. Remove the (1) so it returns a Model, not a Collection
    $record = CDRRecord::factory()->create();

    // 2. Assert the model was actually saved to the database
    expect($record->exists)->toBeTrue();
    
    // OR: Assert it was assigned a database ID
    expect($record->id)->not->toBeNull();
});