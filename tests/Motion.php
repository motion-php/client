<?php

use Motion\Client;

it('may create a client', function () {
    expect(Motion::client('foo'))->toBeInstanceOf(Client::class);
});

it('may create a client via factory', function () {
    $motion = Motion::factory()
        ->withApiKey('foo')
        ->make();

    expect($motion)->toBeInstanceOf(Client::class);
});
