<?php

use App\Helpers\FileParser;
use App\Models\CDRRecord;
use App\Models\Contact;

test('it can process a new CDR record', function () {
    // 1. Remove the (1) so it returns a Model, not a Collection

    expect(CDRRecord::factory()->create()->count())->toBe(1);
});

it('can update a cdr record', function () {
    $new_number = fake()->text();
    $record = CDRRecord::factory(1)->create()->first();
    $record->update(['caller_id' => $new_number]);

    expect($record->caller_id)->toBe($new_number);
});

it('can delete a cdr record', function () {
    $delete_rec = CDRRecord::first();
    expect($delete_rec)->toBeNull();
});

it('can make the association between contact and cdr', function () {
    $contact = Contact::factory()->create();
    $record = CDRRecord::factory()->create();

    $contact->records()->save($record);
    expect($contact->records()->count())->toBe(1);
});

it('can dissociate a contact relationsip', function () {
    $contact = Contact::factory()->create();
    $record = CDRRecord::factory()->create(['contact_id' => $contact->id]);

    $record->contact()->dissociate();
    expect($record->contact_id)->toBeNull();
});

it('can get a collection of all records', function () {
    $records = CDRRecord::factory(20)->create();

    expect($records->count())->toBe(20);
});

it('can gaurd against duplicate start_times', function () {
    $records = FileParser::parse_file();
    $records->each(function ($record) {
        CDRRecord::upsert(['start_time'], []);
        expect(CDRRecord::count())->toBe(20);
    });

});
