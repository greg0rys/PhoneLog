<?php

use App\Helpers\FileParser;

it('has fileparser page', function () {
    $response = $this->get('/fileparser');

    $response->assertStatus(200);
});

it('Can parse the file', function () {
    $records = FileParser::parse_file();

    expect($records)->not->toBeEmpty();
});
