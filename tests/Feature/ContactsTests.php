<?php

use App\Models\CDRRecord;
use App\Models\Contact;

test('it can create a new contact', function () {

    expect(Contact::factory()->create())->not()->toBeNull();
});

it('can get a list of IDs ', function () {
    Contact::factory(10)->create();
    $ids = Contact::pluck('id');

    echo "Plucked {$ids->count()} total id's\n";
    expect($ids)->not->toBeEmpty();
});

it('can delete a user', function () {
    $contact = Contact::factory()->create();

    $contact->delete();

    self::assertSoftDeleted($contact);
});

it('can update a contact', function () {
    $contact = Contact::factory()->create();

    expect($contact->update([
        'name' => fake()->name(),
    ]))->toBe(true);
});

it('can establish a 1:M relationship with call records', function () {
    echo "Running establish 1:M test\n";
    $contact = Contact::factory()->create();

    $record = CDRRecord::factory()->make(); // stores in memory! DOES NOT COMMIT TO DB using make();

    $contact->records()->save($record); // assoicate the record with the contact

    $contact->loadCount('records');

    expect($contact->records_count)->toBe(1);

});

it('can establish more than one relationship at a time', function () {
    $contact = Contact::factory()->create();
    $record = CDRRecord::factory(10)->make();

    $record->each(function ($r) use ($contact) {
        $contact->records()->save($r);
    });

    $contact->loadCount('records');

    expect($contact->records_count)->toBeGreaterThan(1);
});
