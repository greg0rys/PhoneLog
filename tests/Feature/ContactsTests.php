<?php
use App\Models\Contact;
test("it can create a new contact", function()
{
    $contact = Contact::factory(1)->create([
        "name" => "Gregory Shenefelt",
        "phone_number" => "503-330-1866",
    ])->first();

    expect($contact->name)->toBe("Gregory Shenefelt");
});