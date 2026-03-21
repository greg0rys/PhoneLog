<?php
use App\Models\Contact;

use App\Models\CDRRecord;

test("it can process a new CDR record", function () {
    // 1. Remove the (1) so it returns a Model, not a Collection
    $record = CDRRecord::factory()->create();

    // 2. Assert the model was actually saved to the database
    expect($record->exists)->toBeTrue();

    // OR: Assert it was assigned a database ID
    expect($record->id)->not->toBeNull();
});

it("can update a cdr record", function () {
    $new_number = fake()->text();
    $record = CDRRecord::factory(1)->create()->first();
    $record->update(["caller_id" => $new_number]);

    expect($record->caller_id)->toBe($new_number);
});

it("can delete a cdr record", function () {
    $delete_rec = CDRRecord::first();
    expect($delete_rec)->toBeNull();
});

it("can assign a record id to a contact", function()[

]);