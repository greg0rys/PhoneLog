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

it("can update a cdr record", function(){
    $record = CDRRecord::factory(1)->create()->first();
    $record->update(["caller_id" => "1111"]);
    expect($record->caller_id)->toBe("1111");
});
