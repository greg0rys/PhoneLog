<?php
use App\Models\Contact;

use App\Models\CDRRecord;

test("it can create a new cdr record", function () {

    expect(CDRRecord::factory()->create())->not->toBeNull();
});

it("can update a cdr record", function () {
    $new_number = fake()->phoneNumber();
    $record = CDRRecord::factory()->create();
    $record->update(["caller_id" => $new_number]);

    expect($record->caller_id)->toBe($new_number);
});

it("can delete a cdr record", function () {
    $delete_rec = CDRRecord::factory()->create();
    $delete_rec->delete();
    self::assertSoftDeleted($delete_rec);
});

it("can be assigned to a contact", function(){
    $rec = CDRRecord::factory()->create();
    $cont = Contact::factory()->create();
    $rec->contact()->associate($cont);
    $rec->save();
    $rec->load('contact');


    expect($rec->contact_id)->toBe($cont->id);
});
