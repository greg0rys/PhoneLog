<?php
use App\Models\Parser;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
