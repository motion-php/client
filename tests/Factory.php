<?php

use Motion\Client;

it('may set an api key', function () {
    $factory = Motion::factory()
        ->withApiKey('foo')
        ->make();

    expect($factory)->toBeInstanceOf(Client::class);
});
